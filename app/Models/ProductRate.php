<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRate extends Model 
{

    protected $table = 'product_rates';
    public $timestamps = true;
    protected $fillable = array('rate', 'comment', 'product_id', 'user_id', 'status');

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}