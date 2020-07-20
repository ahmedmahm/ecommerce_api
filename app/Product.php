<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Each product has one order from one user
     */
    public function orders(){
        return $this->hasOne('App\Order');
    }
}
