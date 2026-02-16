<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SC Kimia - IDN Boarding School Solo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 flex flex-col min-h-screen">
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-emerald-100">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-black text-emerald-700 tracking-tighter">SC<span
                    class="text-slate-800">KIMIA</span></a>
            <div class="hidden md:flex space-x-8 font-bold text-xs uppercase tracking-widest">
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-emerald-600' : 'hover:text-emerald-600' }}">Beranda</a>
                <a href="{{ route('news.index') }}"
                    class="{{ request()->routeIs('news.*') ? 'text-emerald-600' : 'hover:text-emerald-600' }}">Berita</a>
                <a href="{{ route('gallery.index') }}"
                    class="{{ request()->routeIs('gallery.index') ? 'text-emerald-600' : 'hover:text-emerald-600' }}">Galeri</a>
                <a href="{{ route('about') }}"
                    class="{{ request()->routeIs('about') ? 'text-emerald-600' : 'hover:text-emerald-600' }}">Tentang</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow"> @yield('content') </main>

    <footer class="bg-emerald-950 text-white pt-20 pb-10">
        <div
            class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-12 border-b border-emerald-900 pb-12 text-center md:text-left">
            <div>
                <h3 class="text-2xl font-black text-emerald-400 mb-6 uppercase tracking-tighter">SC Kimia</h3>
                <p class="text-emerald-100/60 leading-relaxed text-sm">Komunitas eksplorasi sains siswa IDN Boarding
                    School Solo yang berfokus pada inovasi molekuler dan teknologi sains modern.</p>
            </div>
            <div>
                <h4 class="font-bold mb-6 uppercase text-xs tracking-[0.2em] text-emerald-400">Navigasi</h4>
                <ul class="space-y-3 text-emerald-100/70 text-sm font-semibold">
                    <li><a href="/news" class="hover:text-emerald-400 transition">Update Berita</a></li>
                    <li><a href="/gallery" class="hover:text-emerald-400 transition">Galeri Kegiatan</a></li>
                    <li><a href="/about" class="hover:text-emerald-400 transition">Tentang Kami</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 uppercase text-xs tracking-[0.2em] text-emerald-400">Lokasi</h4>
                <p class="text-emerald-100/70 text-sm leading-loose">IDN Boarding School Solo<br>Karanganyar, Jawa
                    Tengah.</p>
            </div>
        </div>
        <p class="text-center mt-10 text-emerald-100/20 text-[10px] font-bold uppercase tracking-[0.4em]">© 2026 Science
            Club Kimia IDN Solo.</p>
    </footer>
</body>

</html>