<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model 
{

    protected $table = 'favourites';
    public $timestamps = true;
    protected $fillable = array('product_id', 'user_id', 'status');

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}