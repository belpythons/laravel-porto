@extends('layouts.portfolio-layout')

@section('title', 'Experience')

@section('content')
    <section>
        <h1
            class="text-3xl font-bold tracking-tighter mb-8 sm:text-4xl bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-600 dark:from-white dark:to-slate-400">
            Pengalaman Kerja
        </h1>

        <div class="grid gap-8">
            @forelse ($experiences as $exp)
                <div
                    class="group relative overflow-hidden rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-slate-800 dark:bg-slate-950">
                    <div class="flex flex-col sm:flex-row sm:items-start gap-6">
                        {{-- <img src="{{ $exp['logo'] }}" alt="{{ $exp['company'] }} logo" class="h-16 w-16 rounded-full border dark:border-slate-700"> --}}
                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-lg border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-950">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M3 7v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7" />
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold leading-none tracking-tight text-lg">{{ $exp['title'] }}</h3>
                            <p class="text-slate-600 dark:text-slate-400 mt-1">{{ $exp['company'] }}</p>
                            <p class="text-sm text-slate-500 dark:text-slate-500 mt-2 mb-4">{{ $exp['description'] }}</p>
                            <span
                                class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-900 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-50">
                                {{ $exp['year'] }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-slate-500 dark:text-slate-400">Belum ada pengalaman kerja untuk ditampilkan.</p>
            @endforelse
        </div>
    </section>
@endsection
