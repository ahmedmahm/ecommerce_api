<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id','name', 'qr' ,'price', 'description', 'image', 'category'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Each product has one order from one user
     */
    public function orders(){
        return $this->hasOne('App\Order');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
