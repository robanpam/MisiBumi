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
        Schema::create('kalkulators', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('foto_produk');
            $table->foreignId('emisi_id')->constrained('emisis', 'id');
            $table->decimal('faktor_emisi');
            $table->string('satuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalkulators');
    }
};
