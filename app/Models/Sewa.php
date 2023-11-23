<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'tukangs_id',
        'pelanggans_id',
        'tanggal_sewa',
        'tipe_sewa',
        'tipe_bangunan',
        'tipe_pengerjaan',
        'tipe_pembayaran',
        'deskripsi',
        'status',
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
}
