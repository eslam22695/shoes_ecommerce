<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    protected $table = 'colors';
    public $timestamps = true;
    protected $fillable = array('name', 'code', 'status');
    use HasFactory;

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
