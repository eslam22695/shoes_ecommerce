<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponUser extends Model 
{

    protected $table = 'coupon_users';
    public $timestamps = true;
    protected $fillable = array('status');

    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}