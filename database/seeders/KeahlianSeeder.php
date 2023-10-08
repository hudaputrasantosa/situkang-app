<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keahlians')->insert([
            ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Cat'],
            ['id' => Str::uuid(), 'nama_keahlian' => 'Pemasang Keramik'],
            ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Kayu/Mebel'],
            ['id' => Str::uuid(), 'nama_keahlian' => 'Pemasang Listrik'],
            ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Plafon'],
            ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Las'],
            ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Batu'],
            ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Desain Interior'],
            ['id' => Str::uuid(), 'nama_keahlian' => 'Tenaga Bantu Bangunan'],
        ]);
    }
}
