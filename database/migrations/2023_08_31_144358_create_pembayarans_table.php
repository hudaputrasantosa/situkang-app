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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id("id_pembayaran");
            $table->unsignedBigInteger("id_sewa");
            $table->string("total_harga");
            $table->boolean("payment_status");
            $table->string("payment_link");
            $table->timestamps();

            $table->foreign('id_sewa')->references('id_sewa')->on('sewas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
