@extends('layouts.portfolio-layout')

@section('title', 'Creative Developer')

@section('content')
    {{-- Hero Section Redesign: Brutalism x Abstract --}}
    <section
        class="min-h-[60vh] flex flex-col justify-center items-start gap-8 border-b-2 border-border-main pb-20 relative overflow-visible">

        {{-- Decorative "CREATIVE" backdrop text (optional style) --}}
        <div
            class="absolute -top-20 -right-20 opacity-5 select-none text-[10rem] font-black text-text-muted pointer-events-none hidden md:block">
            PORTFOLIO
        </div>

        <div class="space-y-4 relative z-10 w-full">
            {{-- Animated Reveal Title --}}
            <h1
                class="text-6xl sm:text-8xl md:text-9xl font-black tracking-tighter leading-none text-text-body mix-blend-overlay">
                <span
                    class="block animate-slide-up hover:text-accent-primary transition-colors duration-500 cursor-default">
                    {{ strtoupper($profile['nama']) }}
                </span>
            </h1>

            {{-- Subtitle / Role --}}
            <p class="text-xl sm:text-2xl font-mono text-accent-secondary animate-fade-in delay-300">
                &lt;Creative Developer /&gt;
            </p>

            <p class="text-lg md:text-xl text-text-muted max-w-2xl font-light leading-relaxed animate-fade-in delay-500">
                {{ $profile['deskripsi'] }}
            </p>
        </div>

        {{-- CTA Area --}}
        <div class="flex flex-wrap items-center gap-4 animate-fade-in delay-700">
            @foreach ($profile['socials'] as $social)
                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                    class="group relative inline-flex items-center justify-center px-8 py-3 overflow-hidden font-bold text-bg-body transition-all duration-300 bg-text-body rounded-full hover:bg-transparent hover:text-text-body border-2 border-text-body focus:outline-none ring-offset-2 focus:ring-2 ring-accent-secondary">
                    <span
                        class="absolute w-0 h-0 transition-all duration-500 ease-out bg-accent-secondary rounded-full group-hover:w-56 group-hover:h-56"></span>
                    <span class="relative group-hover:text-bg-body">{{ $social['name'] }}</span>
                </a>
            @endforeach
        </div>

    </section>

    {{-- About Section --}}
    <section class="grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <h2
                class="text-4xl font-bold tracking-tight text-text-body decoration-wavy underline decoration-accent-secondary underline-offset-8">
                Thinking in Code.
            </h2>
            <div class="space-y-4 text-text-muted text-lg">
                <p>
                    Based in <strong class="text-text-body">{{ $profile['alamat'] }}</strong>.
                    Blending technical expertise with artistic vision to build digital experiences that matter.
                </p>
                <div class="grid grid-cols-2 gap-4 text-base font-mono border-l-4 border-accent-primary pl-4">
                    <div>
                        <span class="block text-xs uppercase tracking-widest opacity-60">ID Number</span>
                        {{ $profile['nim'] }}
                    </div>
                    <div>
                        <span class="block text-xs uppercase tracking-widest opacity-60">Status</span>
                        {{ $profile['jenis_kelamin'] }}
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden md:flex justify-center items-center">
            {{-- Abstract visual or code block could go here --}}
            <div
                class="w-full h-64 border border-border-main bg-white/5 backdrop-blur-sm rounded-lg p-6 font-mono text-sm text-accent-primary shadow-2xl skew-y-3 hover:skew-y-0 transition-transform duration-500">
                <span class="text-accent-secondary">class</span> <span class="text-text-body">Developer</span> {
                <br>&nbsp;&nbsp;<span class="text-accent-secondary">constructor</span>() {
                <br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-accent-secondary">this</span>.passion = <span
                    class="text-green-400">'Infinite'</span>;
                <br>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-accent-secondary">this</span>.stack = [<span
                    class="text-yellow-300">'Laravel'</span>, <span class="text-blue-400">'Tailwind'</span>];
                <br>&nbsp;&nbsp;}
                <br>}
            </div>
        </div>
    </section>

    <style>
        .animate-slide-up {
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }

        .delay-300 {
            animation-delay: 300ms;
        }

        .delay-500 {
            animation-delay: 500ms;
        }

        .delay-700 {
            animation-delay: 700ms;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
@endsection