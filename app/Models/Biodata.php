<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'nik',
        'kk',
        'full_name',
        'birth_date',
        'gender',
        'blood',
        'religion',
        'status',
        'profession',
        'note',
        'condition',
        'numbers',
        'email',
        'facebook',
        'instagram',
        'twitter',
        'head_kk',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function education(): HasOne
    {
        return $this->hasOne(Education::class);
    }

    // public function parent()
    // {
    //     return $this->belongsTo(self::class, "anggota_id");
    // }

    // public function child()
    // {
    //     return $this->hasMany(self::class, "anggota_id");
    // }
}
