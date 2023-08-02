<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'capacity',
        'status',
        'user_id',
        'bussiness_id',
    ];

    public function invoice()
    {
        return $this->belongsTo(invoice::class);
    }
}
