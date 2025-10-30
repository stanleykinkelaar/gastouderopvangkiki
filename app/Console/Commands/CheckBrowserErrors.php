<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckBrowserErrors extends Command
{
    protected $signature = 'security:check-browser-errors';

    protected $description = 'Check for common browser console errors and security issues';

    public function handle()
    {
        $this->info('🔍 Checking for common browser console errors and security issues...');

        $checks = [
            $this->checkCSPViolations(),
            $this->checkMixedContent(),
            $this->checkDeprecatedAPIs(),
            $this->checkCookieIssues(),
        ];

        $passed = array_sum($checks);
        $total = count($checks);

        $this->newLine();
        if ($passed === $total) {
            $this->info("✅ All checks passed! ({$passed}/{$total})");
        } else {
            $this->warn("⚠️  Some issues found ({$passed}/{$total} checks passed)");
        }

        return $passed === $total ? 0 : 1;
    }

    private function checkCSPViolations(): bool
    {
        $this->line('📋 Checking Content Security Policy...');

        // Check if CSP is properly configured
        $middlewarePath = app_path('Http/Middleware/SecurityHeaders.php');
        if (file_exists($middlewarePath)) {
            $content = file_get_contents($middlewarePath);
            if (strpos($content, 'Content-Security-Policy') !== false) {
                $this->info('  ✅ CSP middleware configured');
                $this->line('  💡 To test CSP violations, check browser console for CSP errors');

                return true;
            }
        }

        $this->error('  ❌ CSP not properly configured');

        return false;
    }

    private function checkMixedContent(): bool
    {
        $this->line('🔒 Checking Mixed Content issues...');

        $appUrl = config('app.url');
        if (str_starts_with($appUrl, 'https://')) {
            $this->info('  ✅ App URL is HTTPS');
            $this->line('  💡 Ensure all resources (CSS, JS, images) use HTTPS URLs');

            return true;
        } else {
            $this->warn('  ⚠️  App URL is HTTP - this may cause mixed content issues in production');
            $this->line('  💡 Set APP_URL to https:// in production environment');

            return false;
        }
    }

    private function checkDeprecatedAPIs(): bool
    {
        $this->line('🔧 Checking for deprecated APIs...');

        $viewPaths = [
            resource_path('views'),
            resource_path('js'),
        ];

        $deprecatedPatterns = [
            'document.cookie' => 'Consider using secure cookie handling',
            'localStorage' => 'Ensure sensitive data is not stored',
            'eval(' => 'Avoid eval() for security reasons',
        ];

        $issues = 0;
        foreach ($viewPaths as $path) {
            if (is_dir($path)) {
                $files = new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator($path)
                );

                foreach ($files as $file) {
                    if ($file->isFile() && in_array($file->getExtension(), ['php', 'js', 'blade.php'])) {
                        $content = file_get_contents($file->getPathname());
                        foreach ($deprecatedPatterns as $pattern => $message) {
                            if (strpos($content, $pattern) !== false) {
                                $this->warn("  ⚠️  Found '{$pattern}' in {$file->getPathname()}");
                                $this->line("      💡 {$message}");
                                $issues++;
                            }
                        }
                    }
                }
            }
        }

        if ($issues === 0) {
            $this->info('  ✅ No deprecated API usage found');

            return true;
        }

        return false;
    }

    private function checkCookieIssues(): bool
    {
        $this->line('🍪 Checking Cookie configuration...');

        $secure = config('session.secure');
        $httpOnly = config('session.http_only');
        $sameSite = config('session.same_site');

        $issues = 0;

        if (! $secure) {
            $this->warn('  ⚠️  Session cookies are not marked as secure');
            $this->line('  💡 Set SESSION_SECURE_COOKIE=true in .env');
            $issues++;
        } else {
            $this->info('  ✅ Session cookies are secure');
        }

        if (! $httpOnly) {
            $this->warn('  ⚠️  Session cookies are not HTTP-only');
            $this->line('  💡 Set SESSION_HTTP_ONLY=true in .env');
            $issues++;
        } else {
            $this->info('  ✅ Session cookies are HTTP-only');
        }

        if (! in_array($sameSite, ['strict', 'lax'])) {
            $this->warn('  ⚠️  Session cookies SameSite attribute not properly configured');
            $this->line('  💡 Set SESSION_SAME_SITE=strict or lax in .env');
            $issues++;
        } else {
            $this->info("  ✅ Session cookies SameSite is set to '{$sameSite}'");
        }

        return $issues === 0;
    }
}
