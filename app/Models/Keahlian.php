<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Keahlian extends Model
{
    use HasFactory;

    protected $table = "keahlians";
    protected $primaryKey = "id";

    protected $fillable = [
        'nama_keahlian',
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

    public function tukang(): BelongsTo
    {
        return $this->belongsTo(Tukang::class);
    }
}
