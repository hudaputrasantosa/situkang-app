<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    use HasFactory;

    protected $table = 'pengalamans';

    protected $fillable = [
        'id_tukang',
        'nama_proyek',
        'alamat',
        'id_keahlian',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
        'foto',
    ];

    // public function tukang()
    // {
    //     return $this->belongsTo(Tukang::class, "id_tukang");
    // }
}
