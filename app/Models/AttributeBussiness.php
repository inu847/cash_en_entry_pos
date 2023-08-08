<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeBussiness extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'value', 'bussiness_id'];

    public function bussiness()
    {
        return $this->belongsTo(Bussiness::class, 'bussiness_id', 'id');
    }
}
