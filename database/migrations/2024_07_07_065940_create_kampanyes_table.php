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
        Schema::create('kampanyes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->string('nama_kampanye');
            $table->string('lokasi_kampanye');
            $table->foreignId('pohon_id')->constrained('pohons', 'id');
            $table->tinyInteger('status');
            $table->integer('jumlah_pohon');
            $table->date('batas_donasi');
            $table->text('deskripsi');
            $table->string('gambar_kampanye');
            $table->integer('total_pohon');
            // $table->integer('total_donatur');
            // $table->integer('harga_pohon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kampanyes');
    }
};
