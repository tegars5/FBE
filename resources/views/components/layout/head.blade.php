@props([
    'styles' => true,
])

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/fujiyama-logo.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/fujiyama-logo.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/fujiyama-logo-32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/fujiyama-logo-96.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/fujiyama-logo-apple.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/fujiyama-logo.ico') }}" />
    <link rel="manifest" href="/site.webmanifest" />
    
    <!-- Title of the Page -->
    <title>{{ $title ?? 'Fujiyama Biomass Energy' }}</title>

    <!-- Font and Icon Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    
    <!-- Tailwind CSS via CDN (or using Vite in production) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    @vite(['resources/js/main.js'])

    <!-- Conditionally load styles -->
    @if ($styles)
        @vite(entrypoints: ['resources/css/style.css'])
    @else
        @vite(['resources/css/dashboard.css'])
    @endif

    <!-- Tailwind Theme Configuration Script (should be inside <script>) -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'green-custom': '#1B5E20',
                        'green-hover': '#228B22',
                        'green-light': '#4CAF50',
                        'beige': '#F5F5DC',
                        'toner': '#926a2d'
                    },
                    boxShadow: {
                        'green-custom': '0 4px 15px rgba(46, 125, 50, 0.4)',
                        'green-hover': '0 6px 20px rgba(46, 125, 50, 0.6)',
                        'white-custom': '0 6px 20px rgba(255, 255, 255, 0.3)'
                    }
                }
            }
        }
    </script>
</head>
