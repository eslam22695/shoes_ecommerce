<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{

    protected $table = 'abouts';
    public $timestamps = true;
    protected $fillable = array('description', 'policy', 'title1', 'value1', 'title2', 'value2', 'title3', 'value3', 'title4', 'value4', 'terms');
}
