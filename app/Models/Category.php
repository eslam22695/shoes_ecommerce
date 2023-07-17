<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'order', 'parent_id');
    use HasFactory;

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
