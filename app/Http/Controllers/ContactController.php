<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan ke database
        ContactMessage::create($validated);

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
