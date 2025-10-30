<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    
    <!-- Basic SEO Meta Tags -->
    <title>{{ $title ?? 'Gastouderopvang Kiki - Liefevolle Kinderopvang in Capelle aan den IJssel' }}</title>
    <meta name="description" content="{{ $description ?? 'Professionele gastouderopvang voor kinderen van 0-8 jaar in Capelle aan den IJssel, wijk Schollevaar. Kleinschalige, huiselijke opvang met ervaren gastouder.' }}">
    <meta name="keywords" content="gastouderopvang, kinderopvang, Capelle aan den IJssel, Schollevaar, dagopvang, kinderdagverblijf, gastouder, babysit, peuters, kleuters">
    <meta name="author" content="Gastouderopvang Kiki">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="business.business">
    <meta property="og:title" content="{{ $title ?? 'Gastouderopvang Kiki - Liefevolle Kinderopvang in Capelle aan den IJssel' }}">
    <meta property="og:description" content="{{ $description ?? 'Professionele gastouderopvang voor kinderen van 0-8 jaar in Capelle aan den IJssel, wijk Schollevaar. Kleinschalige, huiselijke opvang met ervaren gastouder.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Gastouderopvang Kiki">
    <meta property="og:image" content="{{ asset('images/gastouderopvang-kiki-logo.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Gastouderopvang Kiki - Kinderopvang Capelle aan den IJssel">
    <meta property="og:locale" content="nl_NL">
    
    <!-- Business Information -->
    <meta property="business:contact_data:street_address" content="Vreugdedans 18">
    <meta property="business:contact_data:locality" content="Capelle aan den IJssel">
    <meta property="business:contact_data:postal_code" content="2907TJ">
    <meta property="business:contact_data:country_name" content="Nederland">
    <meta property="business:contact_data:phone_number" content="+31611313969">
    <meta property="business:contact_data:email" content="info@gastouderopvangkiki.nl">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Gastouderopvang Kiki - Liefevolle Kinderopvang in Capelle aan den IJssel' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Professionele gastouderopvang voor kinderen van 0-8 jaar in Capelle aan den IJssel, wijk Schollevaar.' }}">
    <meta name="twitter:image" content="{{ asset('images/gastouderopvang-kiki-logo.jpg') }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Hreflang for Dutch language -->
    <link rel="alternate" hreflang="nl" href="{{ url()->current() }}">
    
    <!-- Favicon and App Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}"> --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    
    <!-- Local Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    
    <!-- CSS -->
    @vite(['resources/css/app.css'])
    
    @stack('styles')
</head>
<body>
    @yield('content')
    
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Gastouderopvang Kiki",
        "description": "Professionele gastouderopvang voor kinderen van 0-8 jaar in Capelle aan den IJssel, wijk Schollevaar. Kleinschalige, huiselijke opvang met ervaren gastouder.",
        "url": "{{ url('/') }}",
        "telephone": "+31-6-11313969",
        "email": "info@gastouderopvangkiki.nl",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Vreugdedans 18",
            "addressLocality": "Capelle aan den IJssel",
            "postalCode": "2907TJ",
            "addressCountry": "NL",
            "addressRegion": "Zuid-Holland"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "51.9244",
            "longitude": "4.5661"
        },
        "openingHours": [
            "Mo-Fr 08:00-18:00"
        ],
        "priceRange": "€€",
        "image": "{{ asset('images/gastouderopvang-kiki-logo.jpg') }}",
        "logo": "{{ asset('images/gastouderopvang-kiki-logo.jpg') }}",
        "sameAs": [
            "{{ url('/') }}"
        ],
        "areaServed": {
            "@type": "City",
            "name": "Capelle aan den IJssel"
        },
        "serviceType": "Kinderopvang",
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Kinderopvang Diensten",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Dagopvang",
                        "description": "Volledige dagopvang in een warme, huiselijke omgeving voor kinderen van 0-8 jaar"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Creatieve Activiteiten",
                        "description": "Dagelijks gevarieerde activiteiten die de creativiteit en ontwikkeling stimuleren"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Buitenspel",
                        "description": "Buitenactiviteiten in zonnige achtertuin en nabij het Schollebos"
                    }
                }
            ]
        }
    }
    </script>
    
    <!-- Cookie Consent Banner -->
    <div id="cookie-consent" style="position:fixed;bottom:0;left:0;right:0;background:#333;color:white;padding:1rem;z-index:1000;display:none;">
        <div style="max-width:1200px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem;">
            <p style="margin:0;flex:1;min-width:300px;">
                Deze website gebruikt cookies om de gebruikerservaring te verbeteren. Door verder te gaan, gaat u akkoord met het gebruik van cookies.
                <a href="#" style="color:#4A90E2;text-decoration:underline;">Meer informatie</a>
            </p>
            <div style="display:flex;gap:0.5rem;">
                <button onclick="acceptCookies()" style="background:#4A90E2;color:white;border:none;padding:0.5rem 1rem;border-radius:4px;cursor:pointer;">Accepteren</button>
                <button onclick="declineCookies()" style="background:#666;color:white;border:none;padding:0.5rem 1rem;border-radius:4px;cursor:pointer;">Weigeren</button>
            </div>
        </div>
    </div>

    <!-- Google Analytics (only loaded with consent) -->
    @if(config('app.env') === 'production' && config('services.google_analytics.tracking_id'))
    <script>
        function loadGoogleAnalytics() {
            // Load Google Analytics
            var script = document.createElement('script');
            script.async = true;
            script.src = 'https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.tracking_id') }}';
            document.head.appendChild(script);
            
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ config('services.google_analytics.tracking_id') }}', {
                page_title: '{{ $title ?? "Gastouderopvang Kiki" }}',
                anonymize_ip: true,
                cookie_flags: 'SameSite=Strict;Secure',
                custom_map: {
                    'dimension1': 'page_type'
                }
            });
        }
        
        function acceptCookies() {
            localStorage.setItem('cookie-consent', 'accepted');
            document.getElementById('cookie-consent').style.display = 'none';
            loadGoogleAnalytics();
        }
        
        function declineCookies() {
            localStorage.setItem('cookie-consent', 'declined');
            document.getElementById('cookie-consent').style.display = 'none';
        }
        
        // Check if user has already made a choice
        window.addEventListener('load', function() {
            const consent = localStorage.getItem('cookie-consent');
            if (consent === 'accepted') {
                loadGoogleAnalytics();
            } else if (consent === 'declined') {
                // Do nothing
            } else {
                // Show consent banner
                document.getElementById('cookie-consent').style.display = 'block';
            }
        });
    </script>
    @endif
    
    @if(config('app.env') === 'production' && config('services.google_search_console.verification'))
    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="{{ config('services.google_search_console.verification') }}">
    @endif
    
    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>