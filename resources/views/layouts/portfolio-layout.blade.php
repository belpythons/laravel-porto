<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile['nama'] }} - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .bg-grid-pattern {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0, 0, 0, 0.05) 1px, transparent 1px);
        }

        /* Adjust grid color based on variables or themes if needed, but opacity 0.05 is usually fine for light. 
           For dark/creative, we might want it lighter or different. 
           Since we use mix-blend-mode on blobs, grid can stay simple. 
           But let's make it responsive to theme vars for best effect.
        */
        [data-theme="dim"] .bg-grid-pattern,
        [data-theme="creative"] .bg-grid-pattern,
        .dark .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        }
    </style>
</head>

<body
    class="min-h-screen bg-bg-body text-text-body antialiased selection:bg-accent-primary selection:text-bg-body transition-colors duration-300 font-sans">

    {{-- Background Effects --}}
    <x-ui.theme-panel />

    <div class="fixed inset-0 -z-10 h-full w-full overflow-hidden pointer-events-none">
        {{-- Blobs --}}
        <x-ui.blob color="var(--accent-secondary)" top="-10%" left="-10%" size="600px" delay="0s"
            class="opacity-30 mix-blend-multiply dark:mix-blend-screen" />
        <x-ui.blob color="var(--accent-primary)" top="40%" left="80%" size="500px" delay="2s"
            class="opacity-30 mix-blend-multiply dark:mix-blend-screen" />
        <x-ui.blob color="var(--text-muted)" top="80%" left="20%" size="400px" delay="4s"
            class="opacity-10 mix-blend-multiply dark:mix-blend-screen" />

        <div
            class="absolute inset-0 bg-grid-pattern [mask-image:radial-gradient(ellipse_at_center,transparent_20%,black)]">
        </div>
    </div>

    <div class="container mx-auto max-w-4xl px-6 py-12 md:py-20 relative">

        {{-- Header & Navigasi --}}
        <header class="mb-12 flex flex-col sm:flex-row items-center justify-between gap-6">
            <nav class="flex items-center gap-8 w-full sm:w-auto justify-between sm:justify-start">
                <a href="{{ route('portfolio.home') }}"
                    class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-text-body to-text-muted">
                    {{ $profile['nama'] }}
                </a>

                {{-- Navigasi Desktop --}}
                <ul class="hidden sm:flex items-center gap-6">
                    @foreach ($navigation as $item)
                        <li>
                            <a href="{{ route($item['route']) }}"
                                class="text-sm font-medium transition-colors hover:text-accent-primary
                                              {{ $item['active'] ? 'text-text-body font-bold border-b-2 border-accent-secondary' : 'text-text-muted' }}">
                                {{ $item['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            {{-- Theme Toggler & Mobile Menu Placeholder --}}
            <div class="flex items-center gap-4">
                <div
                    class="flex items-center gap-1 bg-white/5 backdrop-blur-md rounded-full p-1 border border-border-main">
                    <button onclick="window.toggleTheme('default')"
                        class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-black/5 dark:hover:bg-white/10 transition-colors text-xs"
                        title="Default Theme">
                        ⚪
                    </button>
                    <button onclick="window.toggleTheme('dim')"
                        class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-black/5 dark:hover:bg-white/10 transition-colors text-xs"
                        title="Dim Theme">
                        ⚫
                    </button>
                    <button onclick="window.toggleTheme('creative')"
                        class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-black/5 dark:hover:bg-white/10 transition-colors text-xs"
                        title="Creative Theme">
                        🟣
                    </button>
                </div>
            </div>
        </header>

        <main class="grid gap-12 sm:gap-16">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="mt-20 border-t border-border-main py-10">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-sm text-text-muted">
                    &copy; {{ date('Y') }} {{ $profile['nama'] }}.
                </p>
                <div class="flex gap-4">
                    @foreach ($profile['socials'] as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                            class="text-text-muted hover:text-accent-primary transition-colors">
                            {{ $social['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </footer>
    </div>

</body>

</html>