<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nama Lomba
            $table->string('rank'); // Juara berapa
            $table->string('event_name')->nullable(); // Nama Event
            $table->date('date'); // Tanggal
            $table->string('image')->nullable(); // Foto Bukti
            $table->text('description')->nullable(); // Deskripsi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};