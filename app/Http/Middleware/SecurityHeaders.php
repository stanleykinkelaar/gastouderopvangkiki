<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Content Security Policy (CSP) - Protects against XSS attacks
        // Allow Vite dev server and external resources in development
        if (config('app.env') === 'local') {
            $viteHosts = ' https://gastouderopvangkiki.test:5173 https://gastouderopvangkiki.test:5174 https://gastouderopvangkiki.test:5175 https://gastouderopvangkiki.test:5176 https://vite.gastouderopvangkiki.test:5173 https://vite.gastouderopvangkiki.test:5174 https://vite.gastouderopvangkiki.test:5175 https://vite.gastouderopvangkiki.test:5176';
            $viteWs = ' wss://gastouderopvangkiki.test:5173 wss://gastouderopvangkiki.test:5174 wss://gastouderopvangkiki.test:5175 wss://gastouderopvangkiki.test:5176 ws://gastouderopvangkiki.test:5173 ws://gastouderopvangkiki.test:5174 ws://gastouderopvangkiki.test:5175 ws://gastouderopvangkiki.test:5176';

            $csp = implode('; ', [
                "default-src 'self'",
                "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://www.googletagmanager.com".$viteHosts,
                "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdnjs.cloudflare.com".$viteHosts,
                "font-src 'self' https://fonts.gstatic.com https://cdnjs.cloudflare.com",
                "img-src 'self' data: https: https://picsum.photos",
                "connect-src 'self' https://www.google-analytics.com https://analytics.google.com https://stats.g.doubleclick.net".$viteHosts.$viteWs,
                "frame-ancestors 'none'",
                "base-uri 'self'",
                "form-action 'self'",
                "object-src 'none'",
            ]);
        } else {
            $csp = implode('; ', [
                "default-src 'self'",
                "script-src 'self' 'unsafe-inline' https://www.googletagmanager.com",
                "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdnjs.cloudflare.com",
                "font-src 'self' https://fonts.gstatic.com https://cdnjs.cloudflare.com",
                "img-src 'self' data: https: https://picsum.photos",
                "connect-src 'self' https://www.google-analytics.com https://analytics.google.com https://stats.g.doubleclick.net",
                "frame-ancestors 'none'",
                "base-uri 'self'",
                "form-action 'self'",
                "object-src 'none'",
            ]);
        }

        $response->headers->set('Content-Security-Policy', $csp);

        // HTTP Strict Transport Security (HSTS) - Forces HTTPS
        if ($request->secure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }

        // Cross-Origin Opener Policy (COOP) - Isolates browsing context
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin');

        // Cross-Origin Embedder Policy (COEP) - Additional isolation
        // Relax COEP in development to allow Vite assets
        if (config('app.env') === 'local') {
            $response->headers->set('Cross-Origin-Embedder-Policy', 'unsafe-none');
        } else {
            $response->headers->set('Cross-Origin-Embedder-Policy', 'require-corp');
        }

        // X-Frame-Options - Prevents clickjacking
        $response->headers->set('X-Frame-Options', 'DENY');

        // X-Content-Type-Options - Prevents MIME type sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Referrer Policy - Controls referrer information
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // X-XSS-Protection - Legacy XSS protection (for older browsers)
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Permissions Policy - Controls browser features
        $permissions = implode(', ', [
            'geolocation=()',
            'microphone=()',
            'camera=()',
            'magnetometer=()',
            'gyroscope=()',
            'payment=()',
            'usb=()',
        ]);
        $response->headers->set('Permissions-Policy', $permissions);

        return $response;
    }
}
