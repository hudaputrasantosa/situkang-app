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
        // Schema::table('tukangs', function (Blueprint $table) {
        //     $table->string('tempat_lahir')->after('nama');
        //     $table->date('tanggal_lahir')->after('tempat_lahir');
        //     $table->string('deskripsi')->after('harga')->nullable();
        // });

        // Schema::table('pelanggans', function (Blueprint $table) {
        //     $table->string('tempat_lahir')->after('nama');
        //     $table->string('tanggal_lahir')->after('tempat_lahir');
        //     $table->string('jenis_kelamin')->after('tanggal_lahir');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
