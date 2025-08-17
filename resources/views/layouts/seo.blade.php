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
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></noscript>
    
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
    
    <!-- Google Analytics -->
    @if(config('app.env') === 'production' && config('services.google_analytics.tracking_id'))
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.tracking_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ config('services.google_analytics.tracking_id') }}', {
            page_title: '{{ $title ?? "Gastouderopvang Kiki" }}',
            custom_map: {
                'dimension1': 'page_type'
            }
        });
        
        // Enhanced ecommerce tracking for contact forms
        gtag('config', '{{ config('services.google_analytics.tracking_id') }}', {
            custom_map: {'dimension2': 'contact_form_submission'}
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