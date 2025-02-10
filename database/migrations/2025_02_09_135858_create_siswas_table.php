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
            $table->string('siswa_id', 12)->primary();
            $table->string('kelas_id', 12)->nullable();
            $table->string('jurusan_id', 12)->nullable();
            $table->string('nama_siswa', 100)->nullable();
            $table->string('nis', 20)->nullable();
            $table->enum('jk', ['L', 'P'])->nullable();
            $table->string('email', 100)->nullable();
            $table->timestamps();
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
