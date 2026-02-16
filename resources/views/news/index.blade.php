@extends('layouts.app')

@section('content')
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <header class="mb-16 text-center">
            <h1 class="text-5xl font-black tracking-tighter uppercase italic">Warta <span class="text-emerald-600">Sains.</span></h1>
            <p class="text-slate-500 mt-4 max-w-lg mx-auto">Update terbaru mengenai eksperimen, prestasi, dan kegiatan harian di laboratorium kami.</p>
        </header>

        <div class="grid md:grid-cols-3 gap-10">
            @foreach($news as $item)
            <article class="group">
                <a href="{{ route('news.show', $item->slug) }}">
                    <div class="aspect-[4/3] rounded-[32px] overflow-hidden bg-slate-100 mb-6 shadow-sm group-hover:shadow-2xl group-hover:shadow-emerald-100 transition duration-500">
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    </div>
                    <div class="px-2">
                        <span class="text-[10px] font-black text-emerald-600 uppercase tracking-[0.2em]">{{ $item->category }}</span>
                        <h3 class="text-2xl font-bold mt-2 leading-tight group-hover:text-emerald-600 transition">{{ $item->title }}</h3>
                        <p class="text-slate-400 text-sm mt-3">{{ $item->created_at->format('d M, Y') }}</p>
                    </div>
                </a>
            </article>
            @endforeach
        </div>

        <div class="mt-20">
            {{ $news->links() }}
        </div>
    </div>
</section>
@endsection