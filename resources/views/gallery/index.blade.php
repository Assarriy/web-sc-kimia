@extends('layouts.app')

@section('content')
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            @if($featured->count() > 0)
                <div class="mb-32">
                    <header class="mb-12">
                        <h1 class="text-6xl font-black tracking-tighter uppercase italic text-blue-950">Visual <span
                                class="text-yellow-500">Highlights.</span></h1>
                        <p class="text-slate-500 text-lg mt-4 font-medium">Dokumentasi momen paling berpengaruh SC Kimia.</p>
                    </header>

                    <div class="flex overflow-x-auto gap-10 pb-12 scrollbar-hide">
                        @foreach($featured as $item)
                            <div
                                class="min-w-[400px] md:min-w-[550px] aspect-video relative rounded-[55px] overflow-hidden shadow-2xl border-[12px] border-slate-50 flex-shrink-0">
                                <img src="{{ asset('storage/' . $item->file_path) }}" class="w-full h-full object-cover"
                                    alt="{{ $item->title }}">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-blue-950/80 via-transparent to-transparent p-12 flex flex-col justify-end">
                                    <span
                                        class="text-yellow-400 text-[10px] font-black uppercase tracking-widest mb-3 italic">Pencapaian
                                        Terbaik</span>
                                    <h3 class="text-white font-bold text-3xl leading-tight uppercase italic tracking-tighter">
                                        {{ $item->title }}</h3>
                                    <p class="text-blue-100/60 text-xs mt-2 font-bold tracking-widest uppercase">
                                        {{ $item->category }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mt-20">
                <h2
                    class="text-3xl font-black text-blue-950 uppercase italic tracking-tighter mb-12 flex items-center gap-4">
                    <span class="w-12 h-1 bg-yellow-500 rounded-full"></span>
                    Koleksi Lengkap
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 auto-rows-[250px]">
                    @foreach($all_galleries as $gal)
                        <div
                            class="group relative rounded-[35px] overflow-hidden bg-slate-100 border border-slate-100 shadow-sm hover:shadow-xl transition duration-500">
                            <img src="{{ asset('storage/' . $gal->file_path) }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                            {{-- Indikator jika item ini adalah Featured --}}
                            @if($gal->is_featured)
                                <div class="absolute top-5 right-5 bg-yellow-400 text-blue-900 p-2.5 rounded-full shadow-lg z-10">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                </div>
                            @endif

                            <div
                                class="absolute inset-0 bg-blue-950/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center p-6 text-center">
                                <p class="text-white font-black text-[10px] uppercase tracking-[0.2em] leading-relaxed">
                                    {{ $gal->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-20 flex justify-center">
                    {{ $all_galleries->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection