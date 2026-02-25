@extends('layouts.app')

@section('content')
    <section class="relative py-28 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-20 items-center">
            <div class="z-10">
                <div
                    class="inline-block px-4 py-1.5 rounded-full bg-blue-50 text-blue-700 text-[10px] font-black uppercase tracking-widest mb-8 border border-blue-100">
                    #InnovationThroughScience
                </div>
                <h1
                    class="text-7xl lg:text-9xl font-black leading-[0.8] tracking-tighter mb-10 italic uppercase text-blue-950">
                    Limitless <br><span class="text-yellow-500">Discovery.</span>
                </h1>
                <p class="text-slate-500 text-xl mb-12 max-w-md leading-relaxed">
                    Membuka cakrawala baru dalam dunia kimia dan teknologi di IDN Boarding School Solo.
                </p>
                <div class="flex flex-wrap gap-5">
                    <a href="{{ route('news.index') }}"
                        class="px-12 py-5 bg-blue-900 text-white rounded-2xl font-black shadow-2xl shadow-blue-200 hover:bg-black transition duration-300">JELAJAH
                        WARTA</a>
                    <a href="{{ route('gallery.index') }}"
                        class="px-12 py-5 border-2 border-slate-200 rounded-2xl font-black hover:bg-yellow-400 hover:border-yellow-400 hover:text-blue-950 transition duration-300 uppercase tracking-widest text-xs">Media</a>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -top-20 -right-20 w-80 h-80 bg-yellow-400/20 rounded-full blur-3xl"></div>
                <div
                    class="relative aspect-square rounded-[50px] overflow-hidden shadow-2xl border-[16px] border-white rotate-2 hover:rotate-0 transition duration-700">
                    <img src="{{ asset('images/hero-lab.jpg') }}" class="w-full h-full object-cover" alt="SC Kimia Lab">
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <h2 class="text-4xl font-black uppercase tracking-tighter text-blue-950 italic">Warta <span
                            class="text-yellow-500">Sains.</span></h2>
                    <p class="text-slate-500 mt-2 font-medium">Update terbaru dari laboratorium dan kompetisi.</p>
                </div>
                <a href="{{ route('news.index') }}"
                    class="text-blue-900 font-bold text-xs uppercase tracking-widest border-b-2 border-yellow-400 pb-1">Lihat
                    Semua</a>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                @foreach($news as $item)
                    <a href="{{ route('news.show', $item->slug) }}"
                        class="group block bg-white p-4 rounded-[40px] shadow-sm hover:shadow-2xl transition duration-500 border border-transparent hover:border-yellow-100">
                        <div class="aspect-video rounded-[30px] overflow-hidden bg-slate-100 mb-8">
                            <img src="{{ asset('storage/' . $item->image) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        </div>
                        <div class="px-4 pb-4">
                            <span
                                class="text-[10px] font-black text-yellow-600 uppercase tracking-[0.2em]">{{ $item->category }}</span>
                            <h3
                                class="text-2xl font-bold mt-3 leading-tight text-blue-950 group-hover:text-blue-700 transition">
                                {{ $item->title }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-black mb-16 uppercase tracking-tighter text-blue-950 italic">Momen <span
                    class="text-yellow-500">Unggulan.</span></h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 auto-rows-[300px]">
                @foreach($featured_galleries as $key => $gal)
                    <div
                        class="group relative rounded-[45px] overflow-hidden shadow-sm hover:shadow-2xl transition duration-500 {{ $key % 3 == 0 ? 'md:col-span-2 md:row-span-2' : '' }}">
                        <img src="{{ asset('storage/' . $gal->file_path) }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-950/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition p-10 flex flex-col justify-end">
                            <span class="text-yellow-400 text-[10px] font-black uppercase tracking-widest mb-3 italic">Sorotan
                                Utama</span>
                            <h3 class="text-white font-bold text-2xl leading-tight uppercase italic">{{ $gal->title }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection