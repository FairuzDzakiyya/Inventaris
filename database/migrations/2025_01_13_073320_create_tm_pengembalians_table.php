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
            $table->id();
            $table->string('kembali_id', 20)->unique();
            $table->string('pb_id', 20)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->dateTime('kembali_tgl')->nullable();
            $table->char('kembali_sts', 2)->nullable();
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