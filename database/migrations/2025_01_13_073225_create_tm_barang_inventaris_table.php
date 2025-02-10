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
        Schema::create('tm_barang_inventaris', function (Blueprint $table) {
            $table->string('br_kode', 12)->primary();
            $table->string('jns_brg_kode', 12)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('br_nama', 50)->nullable();
            $table->date('br_tgl_terima')->nullable();
            $table->dateTime('br_tgl_entry')->nullable();
            $table->char('br_status', length: 10)->nullable();
            $table->timestamps();

            $table->foreign('jns_brg_kode')->references('jns_brg_kode')->on('tr_jenis_barangs')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('tm_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tm_barang_inventaris');
    }
};