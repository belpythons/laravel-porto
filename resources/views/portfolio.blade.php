@extends('layouts.portfolio-layout')

@section('title', 'Home')

@section('content')
    {{-- Hero Section (dari app/(root)/page.tsx) --}}
    <section class="flex flex-col items-start gap-6 border-b border-slate-200 pb-10 dark:border-slate-800">
        <div class="space-y-2">
            <h1
                class="text-3xl font-bold tracking-tighter sm:text-5xl xl:text-6xl/none bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-600 dark:from-white dark:to-slate-400">
                {{ $profile['nama'] }}
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl">
                {{ $profile['deskripsi'] }}
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            @foreach ($profile['socials'] as $social)
                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                    class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-950 disabled:pointer-events-none disabled:opacity-50 h-9 px-4 py-2
                          border border-slate-200 bg-white shadow-sm hover:bg-slate-100 hover:text-slate-900
                          dark:border-slate-800 dark:bg-slate-950 dark:hover:bg-slate-800 dark:hover:text-slate-50">
                    {{ $social['name'] }}
                </a>
            @endforeach
        </div>
    </section>

    {{-- Bagian "Tentang Saya" Sederhana (Perbaikan: Menghapus class 'prose') --}}
    <section>
        <h2 class="text-2xl font-semibold tracking-tight text-slate-900 dark:text-slate-50 mb-4">Tentang Saya</h2>
        {{-- Menggunakan class Tailwind standar untuk styling paragraf --}}
        <div class="space-y-4 text-slate-600 dark:text-slate-400">
            <p>
                Berdomisili di <strong>{{ $profile['alamat'] }}</strong>.
                Saat ini sedang menempuh pendidikan atau bekerja dengan fokus pada pengembangan aplikasi web modern.
            </p>
            <p class="text-sm">
                NIM: {{ $profile['nim'] }} <br>
                Jenis Kelamin: {{ $profile['jenis_kelamin'] }}
            </p>
        </div>
    </section>
@endsection
