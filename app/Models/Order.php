<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_PENDING  = 'pending';
    const STATUS_PAID     = 'paid';
    const STATUS_FAILED   = 'failed';
    const STATUS_REFUNDED = 'refunded';


    protected $fillable = ['user_id', 'total_amount', 'currency', 'payment_status', 'stripe_payment_id', 'stripe_client_secret'];
    
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
