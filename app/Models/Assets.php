<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Filament\Support\Assets\Asset;

class Assets extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_date',
        'description',
        'amount',
        'payment',
        'category',
        'invoice',
    ];

    // public function scopeExpenses($query)
    // {
    //     return $query->whereHas('payment', function ($query){
    //         $query->where('payment', 'debit',false);
    //     });
    // }

    // public function scopeIncomes($query)
    // {
    //     return $query->whereHas('payment', function ($query){
    //         $query->where('payment','kredit',false);
    //     });
    // }
}
