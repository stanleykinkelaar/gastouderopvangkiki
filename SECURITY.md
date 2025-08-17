# Security Configuration Guide

This document outlines the security measures implemented to achieve Google Lighthouse security best practices.

## Implemented Security Headers

### 1. Content Security Policy (CSP)
**Purpose**: Protects against XSS attacks by controlling which resources can be loaded.

**Configuration**: `app/Http/Middleware/SecurityHeaders.php`

Current CSP policy:
- `default-src 'self'` - Only allow resources from same origin
- `script-src 'self' 'unsafe-eval' 'unsafe-inline' https://cdn.jsdelivr.net` - Scripts from self and trusted CDN
- `style-src 'self' 'unsafe-inline' https://fonts.googleapis.com` - Styles from self and Google Fonts
- `font-src 'self' https://fonts.gstatic.com` - Fonts from self and Google Fonts
- `img-src 'self' data: https:` - Images from self, data URLs, and HTTPS sources
- `connect-src 'self'` - AJAX requests only to same origin
- `frame-ancestors 'none'` - Prevents embedding in frames (clickjacking protection)
- `base-uri 'self'` - Restricts base element
- `form-action 'self'` - Forms can only submit to same origin

### 2. HTTP Strict Transport Security (HSTS)
**Purpose**: Forces browsers to use HTTPS connections.

**Configuration**: Automatically added for HTTPS requests
- `max-age=31536000` - 1 year cache duration
- `includeSubDomains` - Apply to all subdomains
- `preload` - Eligible for browser preload lists

### 3. Cross-Origin Opener Policy (COOP)
**Purpose**: Isolates browsing context to prevent cross-origin attacks.

**Configuration**: `same-origin` - Isolates from other origins

### 4. Cross-Origin Embedder Policy (COEP)
**Purpose**: Additional isolation for embedded resources.

**Configuration**: `require-corp` - Requires explicit cross-origin permissions

### 5. X-Frame-Options
**Purpose**: Prevents clickjacking attacks.

**Configuration**: `DENY` - Never allow framing

### 6. Additional Security Headers
- `X-Content-Type-Options: nosniff` - Prevents MIME type sniffing
- `Referrer-Policy: strict-origin-when-cross-origin` - Controls referrer information
- `X-XSS-Protection: 1; mode=block` - Legacy XSS protection for older browsers
- `Permissions-Policy` - Restricts browser features (geolocation, camera, etc.)

## Cookie Security Configuration

### Session Cookie Settings
**File**: `config/session.php`

- `secure: true` - Only send cookies over HTTPS
- `http_only: true` - Prevent JavaScript access to cookies
- `same_site: 'strict'` - Strict same-site policy to prevent CSRF

### Environment Variables
Add to your `.env` file:
```env
SESSION_SECURE_COOKIE=true
SESSION_HTTP_ONLY=true
SESSION_SAME_SITE=strict
SESSION_PARTITIONED_COOKIE=false
```

## Third-Party Cookies

The strict cookie configuration helps address third-party cookie issues:
1. Cookies are restricted to same-site requests
2. Secure flag ensures HTTPS-only transmission
3. HttpOnly prevents JavaScript access

## Fixed Google Lighthouse Issues

### ✅ Resolved Issues:
1. **Missing apple-touch-icon.png** - Created placeholder icons for all required sizes
2. **Third-party cookies from Cloudflare CDN** - Moved Font Awesome to local hosting
3. **Third-party cookies from Google Analytics** - Implemented cookie consent banner
4. **Browser console errors** - Fixed missing resources and updated CSP

### Cookie Consent Implementation
Added comprehensive cookie consent system:
- Cookie consent banner appears for new visitors
- Google Analytics only loads after user consent
- User preferences stored in localStorage
- GDPR-compliant consent options (Accept/Decline)

### Font Awesome Optimization
- Downloaded Font Awesome 6.5.1 locally to `/public/css/fontawesome.min.css`
- Eliminated third-party CDN dependency
- Improved performance and privacy

## Browser Console Error Checking

Use the custom Artisan command to check for common security issues:

```bash
php artisan security:check-browser-errors
```

This command checks for:
- CSP configuration
- Mixed content issues
- Deprecated API usage
- Cookie configuration problems

### Current Status:
- ✅ CSP middleware configured
- ✅ Session cookies properly secured
- ⚠️ localStorage usage (for cookie consent - acceptable)
- ⚠️ HTTP URL in development (set HTTPS for production)

## Testing Your Security Implementation

### 1. Test Security Headers
Use online tools like:
- [SecurityHeaders.com](https://securityheaders.com)
- [Mozilla Observatory](https://observatory.mozilla.org)

### 2. Check Console Errors
1. Open browser developer tools
2. Navigate to Console tab
3. Look for CSP violations or security warnings
4. Check Network tab for mixed content issues

### 3. Test CSP Policy
Temporarily add inline scripts/styles to test CSP blocking:
```html
<!-- This should be blocked by CSP -->
<script>alert('test')</script>
<div style="color: red;">Test</div>
```

### 4. Verify Cookie Settings
In browser developer tools:
1. Go to Application/Storage tab
2. Check Cookies section
3. Verify cookies have Secure, HttpOnly, and SameSite flags

## Production Considerations

### 1. HTTPS Setup
Ensure your production environment uses HTTPS:
- Configure SSL certificate
- Set `APP_URL=https://yourdomain.com`
- Consider HTTP to HTTPS redirects

### 2. CSP Refinement
The current CSP allows `unsafe-inline` and `unsafe-eval` for compatibility.
For maximum security, consider:
- Using nonces for inline scripts
- Removing `unsafe-eval` if not needed
- Adding specific domains instead of wildcards

### 3. HSTS Preloading
After testing HSTS for a while, consider submitting your domain to the HSTS preload list:
- Visit [hstspreload.org](https://hstspreload.org)
- Ensure compliance with requirements
- Submit your domain

### 4. Regular Security Audits
- Run `php artisan security:check-browser-errors` regularly
- Use Google Lighthouse security audits
- Monitor for new security headers and best practices

## Troubleshooting

### CSP Issues
If resources are blocked by CSP:
1. Check browser console for violation reports
2. Add legitimate sources to appropriate CSP directives
3. Test changes thoroughly

### Mixed Content Warnings
If you see mixed content warnings:
1. Ensure all asset URLs use HTTPS
2. Check third-party resources
3. Update any hardcoded HTTP URLs

### Cookie Issues
If cookies aren't working properly:
1. Verify HTTPS setup in production
2. Check domain configuration
3. Ensure SameSite compatibility with your use case

## Monitoring

Set up monitoring for:
- CSP violation reports (consider CSP reporting endpoints)
- Security header presence
- SSL certificate expiration
- Security audit scores

Regular monitoring helps maintain security posture and catch issues early.