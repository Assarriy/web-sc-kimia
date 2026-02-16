@extends('layouts.app')

@section('content')
    <section class="py-24 bg-gradient-to-br from-emerald-50 to-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center text-center lg:text-left">
            <div>
                <span class="inline-block px-4 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold mb-6">Era
                    Baru Inovasi Sains</span>
                <h1 class="text-6xl lg:text-8xl font-black leading-[0.85] tracking-tighter mb-8 italic uppercase">
                    Sains<br><span class="text-emerald-600">Modern.</span></h1>
                <p class="text-slate-500 text-lg mb-10 max-w-sm mx-auto lg:mx-0">Eksplorasi kreativitas tanpa batas di
                    laboratorium IDN Boarding School Solo.</p>
                <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                    <a href="{{ route('news.index') }}"
                        class="px-10 py-5 bg-emerald-600 text-white rounded-2xl font-black shadow-xl shadow-emerald-200 hover:bg-emerald-700 transition">LIHAT
                        BERITA</a>
                </div>
            </div>
            <div class="relative group">
                <div
                    class="absolute -inset-4 bg-emerald-400/20 rounded-[40px] blur-2xl group-hover:bg-emerald-400/30 transition">
                </div>
                <div
                    class="relative bg-emerald-200 aspect-[4/5] md:aspect-square rounded-[40px] shadow-2xl overflow-hidden rotate-2 group-hover:rotate-0 transition duration-700">
                    <img src="{{ asset('images/hero-lab.jpg') }}" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-black mb-12 uppercase tracking-tighter">Berita <span
                    class="text-emerald-600">Terbaru</span></h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($news as $item)
                    <a href="{{ route('news.show', $item->slug) }}"
                        class="group block bg-slate-50 p-6 rounded-[32px] hover:bg-emerald-50 transition border border-transparent hover:border-emerald-100">
                        <div class="aspect-video rounded-2xl overflow-hidden bg-slate-200 mb-6">
                            <img src="{{ asset('storage/' . $item->image) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        </div>
                        <span
                            class="text-[10px] font-black text-emerald-600 uppercase tracking-widest">{{ $item->category }}</span>
                        <h3 class="text-xl font-bold mt-2 group-hover:text-emerald-700 transition">{{ $item->title }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection