<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * @var string
     * Refrence to Model database table
     */
    protected $table='addresses';

    protected $fillable = ['user_id', 'type', 'street', 'plz', 'state', 'city', 'country'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * An Order belongs to one user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
