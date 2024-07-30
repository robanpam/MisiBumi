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
        Schema::create('donasis', function (Blueprint $table) {
            // $table->id();
            $table->string('id')->primary();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('kampanye_id')->constrained('kampanyes', 'id');
            $table->integer('nilai_donasi');
            $table->string('metode_pembayaran_id')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
