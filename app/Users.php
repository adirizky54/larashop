<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    public function orders()
    {
        return $this->hasOne('App\Orders');
    }
}
