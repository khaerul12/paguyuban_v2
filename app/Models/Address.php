<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'street',
        'sub_district',
        'regency',
        'city_id',
        'province_id',
        'biodata_id'
    ];

    public function biodata(): BelongsTo
    {
        return $this->belongsTo(Biodata::class, 'biodata_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
