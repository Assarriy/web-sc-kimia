<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_profiles', function (Blueprint $table) {
            $table->id();
            $table->text('about')->nullable(); // Tentang SC Kimia
            $table->text('vision')->nullable(); // Visi
            $table->text('mission')->nullable(); // Misi
            $table->string('logo')->nullable(); // Logo Organisasi (Opsional)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_profiles');
    }
};