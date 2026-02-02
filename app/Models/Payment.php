<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'razorpay_payment_id',
        'razorpay_order_id',
        'razorpay_signature',
        'currency',
        'amount',
        'status',
        'response_json'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
