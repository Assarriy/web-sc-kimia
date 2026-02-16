@extends('layouts.app')

@section('content')
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <header class="mb-20 text-center lg:text-left">
                <span class="text-blue-900 font-bold uppercase tracking-[0.3em] text-xs">Informasi Terkini</span>
                <h1 class="text-6xl font-black tracking-tighter uppercase italic mt-4 text-blue-950">Warta <span
                        class="text-yellow-500">Sains.</span></h1>
                <p class="text-slate-500 mt-6 max-w-xl leading-relaxed">
                    Eksplorasi jurnal kegiatan, pengumuman penting, dan prestasi terbaru dari komunitas SC Kimia IDN
                    Boarding School Solo.
                </p>
            </header>

            <div class="grid md:grid-cols-3 gap-12">
                @foreach($news as $item)
                    <article class="group">
                        <a href="{{ route('news.show', $item->slug) }}">
                            <div
                                class="aspect-[4/3] rounded-[45px] overflow-hidden bg-blue-50 mb-8 shadow-sm group-hover:shadow-2xl group-hover:shadow-blue-900/10 transition duration-500 border border-transparent group-hover:border-yellow-100">
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            </div>
                            <div class="px-4">
                                <div class="flex items-center gap-3 mb-4">
                                    <span
                                        class="px-3 py-1 bg-yellow-400 text-blue-950 text-[10px] font-black uppercase tracking-widest rounded-full">
                                        {{ $item->category }}
                                    </span>
                                    <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">
                                        {{ $item->created_at->format('d M, Y') }}
                                    </span>
                                </div>
                                <h3 class="text-2xl font-bold leading-tight text-blue-950 group-hover:text-blue-700 transition">
                                    {{ $item->title }}
                                </h3>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>

            <div class="mt-24">
                {{ $news->links() }}
            </div>
        </div>
    </section>
@endsection