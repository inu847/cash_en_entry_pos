<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sku',
        'price',
        'purchase_price',
        'regular_price',
        'offer_price',
        'qty',
        'image',
        'description',
        'stock_alert',
        'status',
        'tax_type',
        'tags',
        'free_shipping',
        'warehouse_id',
        'category_id',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
