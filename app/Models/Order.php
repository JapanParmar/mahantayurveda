<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'guest_email',
        'guest_phone',
        'guest_name',
        'order_number',
        'status',
        'payment_status',
        'subtotal',
        'tax',
        'shipping_cost',
        'total',
        'shipping_address',
        'billing_address',
        'notes'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
