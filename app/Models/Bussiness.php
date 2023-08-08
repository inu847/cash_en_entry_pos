<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bussiness extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'address',
        'status',
        'user_id',
    ];

    public function attribute()
    {
        return $this->hasMany(AttributeBussiness::class);
    }
}
