@extends('layouts.portfolio-layout')

@section('title', 'Contributions')

@section('content')
    <section>
        <h1
            class="text-3xl font-bold tracking-tighter mb-8 sm:text-4xl bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-600 dark:from-white dark:to-slate-400">
            Kontribusi Open Source
        </h1>

        <div class="grid gap-6">
            @forelse ($contributions as $contribution)
                <a href="{{ $contribution['url'] }}" target="_blank" rel="noopener noreferrer"
                    class="block rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-slate-800 dark:bg-slate-950 dark:hover:bg-slate-900">
                    <h3 class="font-semibold text-lg">{{ $contribution['title'] }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mt-2">
                        {{ $contribution['description'] }}
                    </p>
                </a>
            @empty
                <p class="text-slate-500 dark:text-slate-400">Belum ada kontribusi untuk ditampilkan.</p>
            @endforelse
        </div>
    </section>
@endsection
