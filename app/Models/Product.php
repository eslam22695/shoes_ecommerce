<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'price', 'discount_price', 'description', 'category_id', 'model_id', 'material_id', 'sole_id', 'color_id', 'status', 'is_discount');

    public function sole()
    {
        return $this->belongsTo('App\Models\Sole');
    }

    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }

    public function rates()
    {
        return $this->hasMany('App\Models\ProductRate');
    }

    public function sizes()
    {
        return $this->hasMany('App\Models\ProductSize');
    }

    public function favourites()
    {
        return $this->hasMany('App\Models\Favourite');
    }

    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function shoe_model()
    {
        return $this->belongsTo('App\Models\ShoeModel', 'model_id');
    }

    public function related()
    {
        return Product::where('category_id', $this->category_id)->where('id', '!=', $this->id)->take(10)->get();
    }

    public function is_favourite()
    {
        if (getCurrentUser()) {
            return  DB::table('favourites')->where([
                ['product_id', '=', $this->id],
                ['user_id', '=', getCurrentUser()]
            ])->exists() ? 1 : 0;
        } else {
            return 0;
        }
    }

    public function all_images()
    {

        $images = $this->productImages->pluck('image')->prepend($this->image);
        //dd($images);
        /* $arr1 = $this->productImages->pluck('image')->toArray();
        $arr1 = Arr::push($arr1 , $this->image); */
        return $images;
    }
}
