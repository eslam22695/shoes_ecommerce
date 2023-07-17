<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('payment_id', 'address_id', 'coupon_id', 'user_id', 'total', 'shipping', 'rate', 'comment', 'status', 'coupon_value');

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon');
    }

    public function cart_items()
    {
        return $this->hasMany('App\Models\CartItem');
    }

    public function payment_method()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }
}