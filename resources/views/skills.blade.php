@extends('layouts.portfolio-layout')

@section('title', 'Skills')

@section('content')
    <section>
        <h1
            class="text-3xl font-bold tracking-tighter mb-8 sm:text-4xl bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-600 dark:from-white dark:to-slate-400">
            Keahlian
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse ($skillCategories as $category)
                <div
                    class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-950">
                    <h3 class="font-semibold text-lg mb-4">{{ $category['category'] }}</h3>
                    <ul class="space-y-3">
                        @foreach ($category['skills'] as $skill)
                            <li class="flex justify-between items-center gap-4">
                                <span class="text-sm text-slate-700 dark:text-slate-300">{{ $skill['name'] }}</span>
                                {{-- Rating (Bintang) --}}
                                <div class="flex gap-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24"
                                            fill="{{ $i <= $skill['rating'] ? 'currentColor' : 'none' }}"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="{{ $i <= $skill['rating'] ? 'text-yellow-400' : 'text-slate-300 dark:text-slate-700' }}">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                        </svg>
                                    @endfor
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @empty
                <p class="text-slate-500 dark:text-slate-400 md:col-span-2">Belum ada keahlian untuk ditampilkan.</p>
            @endforelse
        </div>
    </section>
@endsection
