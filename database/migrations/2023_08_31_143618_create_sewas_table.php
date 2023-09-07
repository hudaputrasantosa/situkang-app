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
            $table->id("id_sewa");
            $table->unsignedBigInteger("id_tukang");
            $table->unsignedBigInteger("id_pelanggan");
            $table->date("tanggal_sewa");
            $table->integer("durasi");
            $table->string("metode_pembayaran");
            $table->timestamps();

            $table->foreign('id_tukang')->references('id_tukang')->on('tukangs');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggans');
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
