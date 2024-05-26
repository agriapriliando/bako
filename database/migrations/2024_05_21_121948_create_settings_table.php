<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 100); //kode kelompok setting
            $table->string('judul'); // judul setting
            $table->text('deskripsi'); // penjelasan setting
            $table->text('isi')->nullable(); // isi
            $table->text('isi2')->nullable(); // isi2
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
