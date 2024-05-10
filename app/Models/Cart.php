<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'katalog_id',
        'price',
        'qty',
        'session_id',
    ];

    public function katalog()
    {
        return $this->belongsTo(Katalog::class, 'katalog_id', 'id');
    }
}
