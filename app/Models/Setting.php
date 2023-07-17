<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('phone1', 'phone2', 'email1', 'email2', 'address1', 'address2', 'facebook', 'twitter', 'instagram', 'youtube', 'created_at', 'updated_at');
}
