@extends('layouts.portfolio-layout')

@section('title', 'Projects')

@section('content')
    <section>
        <h1
            class="text-3xl font-bold tracking-tighter mb-8 sm:text-4xl bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-600 dark:from-white dark:to-slate-400">
            Proyek
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($projects as $project)
                {{--
                    Seluruh card dibungkus dengan tag <a>
                    yang mengarah ke $project['link']
                --}}
                <a href="{{ $project['link'] ?? '#' }}" target="_blank" rel="noopener noreferrer"
                    class="block rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-slate-800 dark:bg-slate-950 dark:hover:bg-slate-900 group">

                    <div class="flex justify-between items-start">
                        {{-- Judul Proyek --}}
                        <h3 class="font-semibold text-lg">{{ $project['title'] }}</h3>

                        {{-- Ikon link eksternal --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="text-slate-400 transition-colors group-hover:text-slate-600 dark:group-hover:text-slate-300 ml-2 flex-shrink-0">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <line x1="10" y1="14" x2="21" y2="3"></line>
                        </svg>
                    </div>

                    {{-- Deskripsi Singkat --}}
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-2 mb-4 min-h-[60px]">
                        {{ $project['description'] }}
                    </p>

                    {{-- Tech Stack --}}
                    <div class="flex flex-wrap gap-2">
                        @foreach ($project['tech'] as $tech)
                            <span
                                class="inline-flex items-center rounded-md bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-700 dark:bg-slate-800 dark:text-slate-300">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                </a>
            @empty
                <p class="text-slate-500 dark:text-slate-400 md:col-span-2">Belum ada proyek untuk ditampilkan.</p>
            @endforelse
        </div>
    </section>
@endsection
