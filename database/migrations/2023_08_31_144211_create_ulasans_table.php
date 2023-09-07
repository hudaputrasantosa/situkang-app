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
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id("id_ulasan");
            $table->unsignedBigInteger("id_sewa");
            $table->integer("nilai");
            $table->string("deskripsi");
            $table->timestamps();

            $table->foreign('id_sewa')->references('id_sewa')->on('sewas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};
