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
        Schema::create('tm_pengembalian', function (Blueprint $table) {
            $table->string('kembali_id')->primary();
            $table->string('pb_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('kembali_tgl')->nullable();
            $table->char('kembali_sts', 2)->nullable();
            $table->timestamps();

            $table->foreign('pb_id')->references('pb_id')->on('tm_peminjaman')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('tm_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tm_pengembalians');
    }
};