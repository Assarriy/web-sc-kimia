@extends('layouts.app')

@section('content')
    <article class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            <header class="mb-16">
                <a href="{{ route('news.index') }}"
                    class="inline-flex items-center gap-2 text-blue-900 font-black text-xs uppercase tracking-widest mb-10 hover:text-yellow-600 transition group">
                    <span class="group-hover:translate-x--1 transition">←</span> Kembali ke Indeks
                </a>

                <div class="flex items-center gap-4 mb-6">
                    <span
                        class="px-4 py-1.5 bg-blue-900 text-yellow-400 rounded-full text-[10px] font-black uppercase tracking-widest">
                        {{ $item->category }}
                    </span>
                    <div class="h-px w-12 bg-slate-200"></div>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">
                        {{ $item->created_at->format('d F Y') }}
                    </p>
                </div>

                <h1 class="text-5xl md:text-7xl font-black tracking-tighter leading-[0.9] text-blue-950 uppercase italic">
                    {{ $item->title }}
                </h1>
            </header>

            <div
                class="aspect-video rounded-[50px] overflow-hidden bg-blue-100 mb-20 shadow-2xl border-[12px] border-slate-50">
                <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
            </div>

            <div class="prose prose-blue prose-lg max-w-none text-slate-600 leading-relaxed font-medium 
                        prose-headings:text-blue-950 prose-headings:font-black prose-headings:uppercase prose-headings:italic 
                        prose-strong:text-blue-900 prose-a:text-yellow-600">
                {!! $item->content !!}
            </div>

            <div class="mt-24 pt-12 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="text-center md:text-left">
                    <h4 class="font-black text-blue-950 text-xl uppercase italic">Tertarik Berinovasi?</h4>
                    <p class="text-slate-500 mt-1">Pelajari lebih lanjut tentang visi SC Kimia IDN Solo.</p>
                </div>
                <a href="{{ route('about') }}"
                    class="px-10 py-5 bg-blue-900 text-white rounded-2xl font-black shadow-xl shadow-blue-200 hover:bg-yellow-400 hover:text-blue-950 transition duration-300 uppercase tracking-widest text-xs">
                    Tentang Kami
                </a>
            </div>
        </div>
    </article>
@endsection