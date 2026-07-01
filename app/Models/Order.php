<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'delivery_type',
        'pickup_address',
        'delivery_address',
        'payment_method',
        'comment',
        'total',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeHistory($query)
    {
        return $query->where('status', '!=', 'active');
    }

    public function orderItems()
    {
        return $this->hasMany(\App\Models\OrderItem::class);
    }
}
