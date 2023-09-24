<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keahlians')->insert([
            ['nama_keahlian' => 'Tukang Cat'],
            ['nama_keahlian' => 'Pemasang Keramik'],
            ['nama_keahlian' => 'Tukang Kayu/Mebel'],
            ['nama_keahlian' => 'Pemasang Listrik'],
            ['nama_keahlian' => 'Tukang Plafon'],
            ['nama_keahlian' => 'Tukang Las'],
            ['nama_keahlian' => 'Tukang Batu'],
            ['nama_keahlian' => 'Tukang Desain Interior'],
            ['nama_keahlian' => 'Tenaga Bantu Bangunan'],
        ]);
    }
}
