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
        Schema::create('kosans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_kosan');
            $table->string('alamat_kosan');
            $table->enum('jenis_kosan', ['Putra', 'Putri', 'Campur']);
            $table->integer('harga_sewa');
            $table->integer('kamar_kosong');
            $table->foreignId('pemilik_id')->constrained('pemiliks')->cascadeOnDelete();
            $table->boolean('tersedia');
            $table->string('foto_kosan')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosans');
    }
};
