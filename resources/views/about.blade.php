@extends('layouts.app')

@section('content')
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-20 items-start">
            <div>
                <h1 class="text-5xl font-black mb-8 leading-tight uppercase tracking-tighter">Tentang <br><span
                        class="text-emerald-600">SC Kimia.</span></h1>
                <div class="prose text-slate-500 text-lg leading-relaxed space-y-6">
                    <p>Didirikan di IDN Boarding School Solo, SC Kimia adalah komunitas bagi para inovator muda yang ingin
                        mendalami keajaiban ilmu kimia dan sains terapan.</p>
                    <p>Kami bangga dengan pencapaian tim kami, termasuk meraih **Excellent Team Award di KRON 2023** dan
                        berbagai inovasi game edukasi sains nasional.</p>
                </div>

                <div class="mt-12 grid grid-cols-2 gap-6">
                    <div class="p-6 bg-emerald-50 rounded-3xl border border-emerald-100">
                        <p class="text-emerald-800 font-black text-3xl italic leading-none mb-2">2023</p>
                        <p class="text-xs font-bold text-emerald-600 uppercase tracking-widest">KRON Excellent Award</p>
                    </div>
                    <div class="p-6 bg-slate-100 rounded-3xl border border-slate-200">
                        <p class="text-slate-800 font-black text-3xl italic leading-none mb-2">3rd</p>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">National Game Dev</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-10 rounded-[40px] shadow-2xl shadow-emerald-100/50 border border-emerald-50">
                <h3 class="text-2xl font-bold mb-8 flex items-center gap-3">
                    <span class="w-2 h-8 bg-emerald-600 rounded-full"></span>
                    Hubungi Admin
                </h3>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-100 text-emerald-800 rounded-2xl text-sm font-bold animate-pulse">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama
                            Lengkap</label>
                        <input type="text" name="name" required
                            class="w-full px-5 py-4 bg-slate-50 rounded-2xl border-none focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email</label>
                        <input type="email" name="email" required
                            class="w-full px-5 py-4 bg-slate-50 rounded-2xl border-none focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Pesan</label>
                        <textarea name="message" rows="4" required
                            class="w-full px-5 py-4 bg-slate-50 rounded-2xl border-none focus:ring-2 focus:ring-emerald-500 outline-none transition"></textarea>
                    </div>
                    <button
                        class="w-full py-5 bg-emerald-600 text-white font-black rounded-2xl shadow-xl shadow-emerald-200 hover:bg-emerald-700 active:scale-95 transition duration-200 uppercase tracking-widest">Kirim
                        Sekarang</button>
                </form>
            </div>
        </div>
    </section>
@endsection