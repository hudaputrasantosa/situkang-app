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
        Schema::create('pengalamans', function (Blueprint $table) {
            $table->id("id_pengalaman");
            $table->foreignId("id_tukang")->constrained();
            $table->string("nama_proyek");
            $table->string("alamat");
            $table->string("posisi_keahlian");
            $table->date("bulan_mulai");
            $table->date("bulan_selesai");
            $table->string("deskripsi");
            $table->string("foto");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalamans');
    }
};
