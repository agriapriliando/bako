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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained();
            $table->foreignId('pasar_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('hargahariini')->nullable();
            $table->integer('hargaminggulalu')->nullable();
            $table->integer('hargabulanlalu')->nullable();
            $table->string('deskripsi')->nullable();
            $table->enum('status', ['Tetap', 'Turun', 'Naik']);
            $table->integer('selisih')->default(0);
            $table->float('persen', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
