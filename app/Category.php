<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];
    public function product()
    {
        $this->hasMany('App\Product','category_id','name');
    }
}
