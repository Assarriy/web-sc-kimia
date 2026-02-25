<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Simpan ke database agar muncul di Filament Admin Panel
        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => 'Pesan dari Halaman About',
            'message' => $validated['message'],
            'is_read' => false,
        ]);

        // Redirect kembali ke halaman About dengan pesan sukses
        return redirect()->route('about')->with('success', 'Pesan Anda berhasil dikirim ke Admin SC Kimia!');
    }
}
