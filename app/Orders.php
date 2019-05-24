<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    public function users()
    {
    	return $this->belongsTo('App\Users');
    }
}
