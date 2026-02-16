<div class="max-w-xl mx-auto p-8 bg-white shadow-lg rounded-xl">
    <h1 class="text-2xl font-bold text-amber-600 mb-6">Hubungi SC Kimia</h1>

    @if(session('success'))
        <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg">{{ session('success') }}</div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Nama Lengkap" required class="w-full border rounded-lg p-3">
        <input type="email" name="email" placeholder="Alamat Email" required class="w-full border rounded-lg p-3">
        <input type="text" name="subject" placeholder="Subjek Pesan" required class="w-full border rounded-lg p-3">
        <textarea name="message" placeholder="Isi Pesan" rows="5" required
            class="w-full border rounded-lg p-3"></textarea>

        <button type="submit" class="w-full bg-amber-600 text-white font-bold py-3 rounded-lg hover:bg-amber-700">
            Kirim Pesan
        </button>
    </form>
</div>