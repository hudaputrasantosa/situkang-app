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
        Schema::create('tukangs', function (Blueprint $table) {
            $table->id('id_tukang');
            $table->string('nama');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('alamat');
            $table->unsignedBigInteger('id_keahlian');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('no_telepon');
            $table->string('harga');
            $table->string('foto')->default(null);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_keahlian')->references('id_keahlian')->on('keahlians');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tukangs');
    }
};
