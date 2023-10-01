<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Keahlian extends Model
{
    use HasFactory;

    protected $table = "keahlians";

    protected $fillable = [
        'nama_keahlian',
    ];

    public function tukang(): HasOne
    {
        return $this->hasOne(Tukang::class);
    }
}
