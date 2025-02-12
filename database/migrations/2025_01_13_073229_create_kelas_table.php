<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->bigIncrements('kelas_id'); // Menggunakan bigIncrements untuk ID otomatis
            $table->string('jurusan_id', 12)->nullable();
            $table->string('kelas', 100)->nullable();
            $table->string('no_kelas', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};