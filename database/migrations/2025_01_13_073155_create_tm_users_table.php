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
        Schema::create('tm_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary()->autoIncrement();
            $table->string('user_nama', 50)->nullable();
            $table->string('user_pass')->nullable();
            $table->char('user_hak', 2)->nullable();
            $table->char('user_sts', 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tm_users');
    }
};