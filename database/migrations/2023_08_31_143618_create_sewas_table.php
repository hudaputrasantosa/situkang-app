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
            $table->foreignId("id_tukang")->constrained();
            $table->foreignId("id_pelanggan")->constrained();
            $table->date("tanggal_sewa");
            $table->integer("durasi");
            $table->string("metode_pembayaran");
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
