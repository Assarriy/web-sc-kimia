<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-blue-950 relative overflow-hidden">
        <div class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-yellow-400/10 rounded-full blur-3xl"></div>
        <div class="w-full max-w-md p-12 bg-white rounded-[40px] shadow-2xl relative z-10">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-blue-900 uppercase italic">SC<span
                        class="text-yellow-500">KIMIA</span></h2>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-2">Login Administrasi</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <input type="email" name="email" placeholder="EMAIL" required
                    class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-yellow-400 outline-none font-bold text-blue-950" />
                <input type="password" name="password" placeholder="PASSWORD" required
                    class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-yellow-400 outline-none font-bold text-blue-950" />
                <button type="submit"
                    class="w-full py-5 bg-blue-900 text-white font-black rounded-2xl shadow-xl hover:bg-black transition duration-300 uppercase tracking-widest text-xs">Masuk
                    Sekarang</button>
            </form>
        </div>
    </div>
</x-guest-layout>