<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded =[];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bayar()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
