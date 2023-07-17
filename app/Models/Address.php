<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $table = 'addresses';
    public $timestamps = true;
    protected $fillable = array('city_id', 'district_id', 'street', 'building', 'floor', 'apartment', 'phone', 'lat', 'long', 'status', 'user_id');
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
