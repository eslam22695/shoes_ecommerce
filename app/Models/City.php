<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'status');
    use HasFactory;

    public function districts()
    {
        return $this->hasMany('App\Models\District');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }
}
