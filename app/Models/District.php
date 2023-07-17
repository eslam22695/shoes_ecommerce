<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    protected $table = 'districts';
    public $timestamps = true;
    protected $fillable = array('name', 'city_id', 'status');
    use HasFactory;

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }
}
