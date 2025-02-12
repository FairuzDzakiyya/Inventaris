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
        Schema::create('tm_peminjaman', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('pb_id')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('pb_tgl')->nullable();
            $table->string('pb_no_siswa', 20)->nullable();
            $table->string('pb_nama_siswa', 100)->nullable();
            $table->unsignedBigInteger('kelas_id')->nullable(); // Menggunakan unsignedBigInteger
            $table->dateTime('pb_harus_kembali_tgl')->nullable();
            $table->char('pb_stat', 15)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('tm_users')->onDelete('cascade');
            $table->foreign('kelas_id')->references('kelas_id')->on('kelas')->onDelete('cascade'); // Foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tm_peminjaman');
    }
};