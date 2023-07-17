<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{

    protected $table = 'cart_items';
    public $timestamps = true;
    protected $fillable = array('product_size_id', 'quantity', 'order_id', 'user_id', 'price', 'status', 'color_id');

    public function product_size()
    {
        return $this->belongsTo('App\Models\ProductSize');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }
}