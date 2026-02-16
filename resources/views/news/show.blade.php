@extends('layouts.app')

@section('content')
    <article class="py-20">
        <div class="max-w-4xl mx-auto px-6">
            <header class="mb-12">
                <a href="{{ route('news.index') }}"
                    class="text-emerald-600 font-bold text-xs uppercase tracking-widest flex items-center gap-2 mb-8 hover:translate-x-[-4px] transition">
                    ← Kembali ke Berita
                </a>
                <span
                    class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-black uppercase tracking-widest">
                    {{ $item->category }}
                </span>
                <h1 class="text-4xl md:text-6xl font-black tracking-tighter mt-6 leading-tight">
                    {{ $item->title }}
                </h1>
                <p class="text-slate-400 mt-6 font-medium">Ditulis pada {{ $item->created_at->format('d F Y') }}</p>
            </header>

            <div class="aspect-video rounded-[40px] overflow-hidden bg-slate-200 mb-16 shadow-2xl">
                <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
            </div>

            <div class="prose prose-emerald prose-lg max-w-none text-slate-600 leading-relaxed">
                {!! $item->content !!}
            </div>

            <hr class="my-20 border-slate-100">

            <div class="bg-emerald-50 p-10 rounded-[40px] flex items-center justify-between flex-wrap gap-6">
                <div>
                    <h4 class="font-bold text-emerald-900">Tertarik bergabung?</h4>
                    <p class="text-emerald-700/70 text-sm">Pelajari lebih lanjut tentang kegiatan kami di halaman About.</p>
                </div>
                <a href="{{ route('about') }}"
                    class="px-8 py-4 bg-emerald-600 text-white rounded-2xl font-black shadow-lg shadow-emerald-200 hover:bg-emerald-700 transition">HUBUNGI
                    KAMI</a>
            </div>
        </div>
    </article>
@endsection