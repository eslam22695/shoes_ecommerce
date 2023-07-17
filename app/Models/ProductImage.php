<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    public $timestamps = true;
    protected $fillable = array('image', 'product_id', 'status');

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
