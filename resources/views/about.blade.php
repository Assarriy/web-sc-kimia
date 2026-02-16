@extends('layouts.app')

@section('content')
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-24 items-start">
            <div>
                <h1 class="text-6xl font-black mb-10 leading-none uppercase italic text-blue-950">Sejarah & <br><span
                        class="text-yellow-500 underline decoration-blue-950 underline-offset-8">Visi Kami.</span></h1>
                <div class="space-y-8 text-slate-500 text-lg leading-relaxed">
                    <p>SC Kimia IDN Boarding School Solo hadir sebagai episentrum inovasi bagi siswa yang ingin
                        menggabungkan ilmu sains dengan teknologi modern.</p>
                    <p>Kami bangga telah menorehkan tinta emas melalui **Excellent Team Award di KRON 2023** dan berbagai
                        kompetisi tingkat nasional.</p>
                </div>

                <div class="mt-16 flex gap-10">
                    <div class="text-center">
                        <p class="text-5xl font-black text-blue-900 mb-2 italic tracking-tighter">2023</p>
                        <p class="text-[10px] font-black text-yellow-600 uppercase tracking-widest leading-none">
                            International KRON Award</p>
                    </div>
                    <div class="w-px h-16 bg-slate-200"></div>
                    <div class="text-center">
                        <p class="text-5xl font-black text-blue-900 mb-2 italic tracking-tighter">3rd</p>
                        <p class="text-[10px] font-black text-yellow-600 uppercase tracking-widest leading-none">National
                            Game Dev</p>
                    </div>
                </div>
            </div>

            <div class="bg-blue-950 p-12 rounded-[50px] shadow-2xl relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-yellow-400/10 rounded-full"></div>
                <h3 class="text-3xl font-black mb-10 text-white italic uppercase tracking-tighter">Hubungi <span
                        class="text-yellow-400">Admin.</span></h3>

                @if(session('success'))
                    <div
                        class="mb-8 p-5 bg-yellow-400 text-blue-950 rounded-2xl text-xs font-black uppercase text-center animate-pulse">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-blue-100/40 uppercase tracking-[0.2em] ml-2">Nama
                            Lengkap</label>
                        <input type="text" name="name" required
                            class="w-full px-6 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-yellow-400 text-white outline-none transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-blue-100/40 uppercase tracking-[0.2em] ml-2">Email</label>
                        <input type="email" name="email" required
                            class="w-full px-6 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-yellow-400 text-white outline-none transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-blue-100/40 uppercase tracking-[0.2em] ml-2">Pesan</label>
                        <textarea name="message" rows="4" required
                            class="w-full px-6 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-yellow-400 text-white outline-none transition"></textarea>
                    </div>
                    <button
                        class="w-full py-5 bg-yellow-400 text-blue-950 font-black rounded-2xl shadow-xl hover:bg-white transition duration-300 uppercase tracking-[0.2em] text-xs">
                        Kirim ke Dashboard
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection