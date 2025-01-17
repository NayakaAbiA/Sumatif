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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('nis')->unique()->nullable(); // Change int to integer
            $table->string('nisn')->unique()->nullable(); // Kolom untuk NISN
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan', 'Bencong'])->nullable();
            $table->unsignedBigInteger('kelas_id'); // Kolom kelas_id untuk relasi
            $table->timestamps();

            // Definisikan foreign key untuk kelas_id
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
