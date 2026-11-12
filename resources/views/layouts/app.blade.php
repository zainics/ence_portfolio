<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Zainal Arifin | Portfolio & CV')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { red: '#E50914', dark: '#0B0D10', card: '#14181F', border: '#2A303C', muted: '#8C9B9E' }
                    }
                }
            }
        }
    </script>
    <style>
        .poster-heading { font-family: 'Impact', 'Bebas Neue', sans-serif; letter-spacing: 0.05em; }
        .bg-grid-pattern { background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 0); background-size: 24px 24px; }
    </style>
</head>
<body class="bg-brand-dark text-gray-100 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- Navbar -->
    <nav class="sticky top-0 z-40 bg-brand-dark/90 backdrop-blur-md border-b border-brand-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="poster-heading text-2xl tracking-wider text-white">
                ZAINAL ARIFIN <span class="text-brand-red">.</span>
            </a>
            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-brand-red' : 'hover:text-brand-red' }} transition-colors">Home</a>
                <a href="{{ route('cv') }}" class="{{ request()->routeIs('cv') ? 'text-brand-red' : 'hover:text-brand-red' }} transition-colors">Vitae</a>
                <a href="{{ route('experience') }}" class="{{ request()->routeIs('experience') ? 'text-brand-red' : 'hover:text-brand-red' }} transition-colors">Experience</a>
                <a href="{{ route('contact') }}" class="bg-brand-red text-white px-4 py-2 rounded font-semibold hover:bg-red-700 transition">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-brand-border py-6 text-center text-xs text-gray-500">
        &copy; {{ date('Y') }} Zainal Arifin. All Rights Reserved.
    </footer>

</body>
</html>