@extends('layouts.app')

@section('content')
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <h1 class="text-5xl font-black tracking-tighter uppercase italic">Lensa <span
                            class="text-emerald-600">Kegiatan.</span></h1>
                    <p class="text-slate-500 mt-2">Dokumentasi eksperimen dan momen berharga SC Kimia IDN Solo.</p>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[280px]">
                @foreach($galleries as $key => $gal)
                    <div class="group relative rounded-[32px] overflow-hidden bg-emerald-200 shadow-sm hover:shadow-2xl transition duration-500 
                        {{ $key % 5 == 0 ? 'md:col-span-2 md:row-span-2' : '' }}">

                        <img src="{{ asset('storage/' . $gal->file_path) }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-emerald-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500 p-8 flex flex-col justify-end">
                            <span
                                class="text-emerald-400 text-[10px] font-black uppercase tracking-widest mb-2">{{ $gal->category }}</span>
                            <h3 class="text-white font-bold text-lg leading-tight">{{ $gal->title }}</h3>
                        </div>

                        {{-- Indikator Video jika ada --}}
                        @if($gal->type === 'video')
                            <div
                                class="absolute top-6 right-6 w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M4 4l12 6-12 6V4z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-16">
                {{ $galleries->links() }}
            </div>
        </div>
    </section>
@endsection