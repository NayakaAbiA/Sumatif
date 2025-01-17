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
        Schema::create('kisi_kisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file')->nullable();
            $table->unsignedBigInteger('ukuran')->nullable();
            $table->string('nama_guru')->nullable();
            $table->string('mapel')->nullable();
            $table->enum('tingkat', ['X', 'XI', 'XII'])->nullable();
            $table->enum('konsentrasi', ['TKRO', 'TKJT', 'PPLG', 'DPIB', 'MP', 'AK', 'SP'])->nullable();  // Konsentrasi atau jurusan

            // Menambahkan kolom user_id
            $table->unsignedBigInteger('user_id'); // Menambahkan kolom user_id

            // Menambahkan foreign key yang mengacu pada kolom id di tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relasi foreign key dengan tabel users

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kisi_kisi');
    }
};
