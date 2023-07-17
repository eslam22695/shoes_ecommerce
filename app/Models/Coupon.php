<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    protected $table = 'coupons';
    public $timestamps = true;
    protected $fillable = array('name', 'code', 'value', 'type', 'uses', 'valid_from', 'valid_to', 'status', 'min_total');
    use HasFactory;

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
