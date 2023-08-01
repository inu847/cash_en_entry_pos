<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'code',
        'parent_category',
        'items',
        'bussiness_id',
        'user_id',
    ];
}
