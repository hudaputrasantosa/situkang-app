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
            // ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Cat', 'deskripsi' => 'Tenaga ahli yang bertanggung jawab untuk mengecat dinding dan material bangunan.', 'foto' => 'cat.jpg'],
            // ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Keramik', 'deskripsi' => 'Tenaga ahli yang bertanggung jawab untuk memasang keramik di lantai, dinding, dan langit-langit.', 'foto' => 'keramik.jpg'],
            // ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Kayu/Mebel', 'deskripsi' => 'Tenaga ahli yang bertanggung jawab untuk mengerjakan pekerjaan kayu, seperti kusen pintu, jendela, furniture, dan sebagainya.', 'foto' => 'kayu.jpg'],
            // ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Listrik', 'deskripsi' => 'Tenaga ahli yang bertanggung jawab untuk mengerjakan pekerjaan instalasi listrik. '], 'foto' => 'listrik.jpg',
            // ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Plafon', 'deskripsi' => 'Tenaga ahli yang bertanggung jawab untuk memasang plafon.', 'foto' => 'plafon.jpg'],
            // ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Las', 'deskripsi' => 'Tenaga ahli yang bertanggung jawab untuk mengerjakan pekerjaan pengelasan.', 'foto' => 'las.jpg'],
            // ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Batu', 'deskripsi' => 'Tenaga ahli yang bertanggung jawab untuk mengerjakan pekerjaan batu, seperti batu bata, batu alam, dan sebagainya.', 'foto' => 'batu-bata.jpg'],
            // ['id' => Str::uuid(), 'nama_keahlian' => 'Tukang Desain Interior', 'deskripsi' => 'Tenaga ahli yang bertanggung jawab untuk merancang dan merealisasi interior suatu bangunan.', 'foto' => 'interior.jpg'],
            // ['id' => Str::uuid(), 'nama_keahlian' => 'Tenaga Bantu Bangunan', 'deskripsi' => 'Tenaga kerja yang membantu tukang bangunan dalam mengerjakan berbagai pekerjaan konstruksi.', 'foto' => 'tenaga-bantu.jpg'],
            // ['id' => Str::uuid(), 'nama_keahlian' => 'Mandor', 'deskripsi' => 'Keahlian yang bertugas untuk memimpin jalannya konstruksi serta memberi instruksi kepada tukang bangunan', 'foto' => 'mandor.jpg'],
        ]);
    }
}
