<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    public $timestamps = true;
    protected $fillable = array('name', 'status');

    public function products()
    {
        return $this->hasMany('App\Models\ProductSize');
    }
}
