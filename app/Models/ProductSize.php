<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $table = 'product_sizes';
    public $timestamps = true;
    protected $fillable = array('size_id', 'product_id', 'quantity', 'status');

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }

    public function cart_items()
    {
        return $this->hasMany('App\Models\CartItem');
    }
}
