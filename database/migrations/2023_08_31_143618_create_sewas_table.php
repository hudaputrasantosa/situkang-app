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
        Schema::create('sewas', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUlid('tukangs_id', 36)->references('id')->on('tukangs');
            $table->foreignUlid('pelanggans_id', 36)->references('id')->on('pelanggans');
            $table->string("tanggal_sewa");
            $table->string("tipe_sewa");
            $table->string("tipe_bangunan");
            $table->string("tipe_pengerjaan");
            $table->string("tipe_pembayaran");
            $table->string("deskripsi");
            $table->string("status");
            $table->string("catatan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewas');
    }
};
