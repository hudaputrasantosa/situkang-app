<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengalaman extends Model
{
    use HasFactory;

    protected $table = 'pengalamans';

    protected $fillable = [
        'tukangs_id',
        'nama_proyek',
        'alamat',
        'keahlians_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
        'foto',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
    // public function tukang()
    // {
    //     return $this->belongsTo(Tukang::class, "id_tukang");
    // }
}
