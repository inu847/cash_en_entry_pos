<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInstruction extends Model
{
    use HasFactory;
    protected $table = 'product_instructions';
    protected $guarded =[];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }

}