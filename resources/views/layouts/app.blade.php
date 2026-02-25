<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SC Kimia - Prestige Science Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(15px);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 flex flex-col min-h-screen">
    <nav class="sticky top-0 z-50 glass border-b border-blue-100">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <a href="/" class="text-2xl font-black text-blue-900 tracking-tighter uppercase italic">SC<span
                    class="text-yellow-500">KIMIA</span></a>
            <div class="hidden md:flex space-x-10 font-bold text-xs uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-yellow-600' : 'hover:text-blue-700' }}">Beranda</a>
                <a href="{{ route('news.index') }}"
                    class="{{ request()->routeIs('news.*') ? 'text-yellow-600' : 'hover:text-blue-700' }}">Berita</a>
                <a href="{{ route('gallery.index') }}"
                    class="{{ request()->routeIs('gallery.index') ? 'text-yellow-600' : 'hover:text-blue-700' }}">Galeri</a>
                <a href="{{ route('about') }}"
                    class="{{ request()->routeIs('about') ? 'text-yellow-600' : 'hover:text-blue-700' }}">Tentang</a>
            </div>
        </div>
    </nav>
    <main class="flex-grow"> @yield('content') </main>
    <footer class="bg-blue-950 text-white pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-12 border-b border-blue-900/50 pb-12">
            <div>
                <h3 class="text-2xl font-black text-yellow-400 mb-6 uppercase italic">SC Kimia</h3>
                <p class="text-blue-100/60 text-sm">IDN Boarding School Solo.</p>
            </div>
            <div>
                <h4 class="font-bold mb-6 uppercase text-xs text-yellow-500">Navigasi</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="/news" class="hover:text-yellow-400">Berita</a></li>
                    <li><a href="/gallery" class="hover:text-yellow-400">Galeri</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 uppercase text-xs text-yellow-500">Kontak</h4>
                <p class="text-blue-100/60 text-sm">Karanganyar, Jawa Tengah.</p>
            </div>
        </div>
        <p class="text-center mt-10 text-blue-100/20 text-[10px] font-bold uppercase tracking-[0.4em]">© 2026 SC Kimia
            IDN Solo.</p>
    </footer>
</body>

</html>