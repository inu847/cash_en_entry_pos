<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_code',
        'customer_name',
        'customer_phone',
        'customer_address',
        'customer_email',
        'total',
        'discount',
        'tax',
        'grand_total',
        'paid',
        'due',
        'type',
        'note',
        'check_in',
        'check_out',
        'user_id',
        'bussiness_id',
        'table_id',
        'payment_id',
        'pay',
        'status',
        'warehouse_id',
    ];

    public function table()
    {
        return $this->hasMany(Table::class, 'table_id', 'id');
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }
}
