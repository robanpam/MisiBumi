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
        Schema::create('pohons', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_latin');
            $table->text('deskripsi');
            $table->string('gambar_pohon');
            $table->text('manfaat');
            $table->text('syarat_tumbuh');
            $table->decimal('serapan_karbon');
            $table->integer('harga_pohon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pohons');
    }
};
