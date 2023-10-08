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
            $table->uuid("id")->primary();
            $table->foreignUlid('tukangs_id', 36)->references('id')->on('tukangs');
            $table->string("nama_proyek");
            $table->string("alamat");
            $table->foreignUlid("keahlians_id", 36)->references('id')->on('keahlians');
            $table->string("tanggal_mulai");
            $table->string("tanggal_selesai");
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
