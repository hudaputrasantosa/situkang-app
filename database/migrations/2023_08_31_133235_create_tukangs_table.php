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
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('alamat')->nullable();
            $table->foreignUlid('keahlians_id', 36)->references('id')->on('keahlians');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('no_telepon')->nullable();
            $table->string('harga');
            $table->text('deskripsi')->nullable();
            $table->text('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
