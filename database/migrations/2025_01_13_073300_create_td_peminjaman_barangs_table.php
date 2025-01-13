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
        Schema::create('td_peminjaman_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('pbd_id', 20)->unique();
            $table->string('pb_id', 20)->nullable();
            $table->string('br_kode', 12)->nullable();
            $table->char('pdb_sts', 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('td_peminjaman_barangs');
    }
};