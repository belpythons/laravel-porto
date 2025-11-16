<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile['nama'] }} - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-grid-pattern {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0, 0, 0, 0.05) 1px, transparent 1px);
        }

        .dark .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.07) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.07) 1px, transparent 1px);
        }
    </style>
</head>

<body
    class="min-h-screen bg-white text-slate-900 antialiased selection:bg-slate-900 selection:text-white dark:bg-slate-950 dark:text-slate-50">

    {{-- Background Effects --}}
    <div
        class="fixed inset-0 -z-10 h-full w-full bg-white dark:bg-slate-950 bg-grid-pattern [mask-image:radial-gradient(ellipse_at_center,transparent_20%,black)]">
    </div>

    <div class="container mx-auto max-w-4xl px-6 py-12 md:py-20">

        {{-- Header & Navigasi --}}
        <header class="mb-12">
            <nav class="flex items-center justify-between">
                <a href="{{ route('portfolio.home') }}"
                    class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-600 dark:from-white dark:to-slate-400">
                    {{ $profile['nama'] }}
                </a>

                {{-- Navigasi Desktop --}}
                <ul class="hidden sm:flex items-center gap-6">
                    @foreach ($navigation as $item)
                        <li>
                            <a href="{{ route($item['route']) }}"
                                class="text-sm font-medium transition-colors
                                      {{ $item['active']
                                          ? 'text-slate-950 dark:text-white'
                                          : 'text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200' }}">
                                {{ $item['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                {{-- TODO: Tambahkan Navigasi Mobile jika diperlukan --}}
            </nav>
        </header>

        <main class="grid gap-12 sm:gap-16">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="mt-20 border-t border-slate-200 py-10 dark:border-slate-800">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    &copy; {{ date('Y') }} {{ $profile['nama'] }}.
                </p>
                <div class="flex gap-4">
                    @foreach ($profile['socials'] as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                            class="text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200 transition-colors">
                            {{ $social['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </footer>
    </div>

</body>

</html>
