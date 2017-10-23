<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdressType extends Model
{
    //
    public function clientadresses()
    {
        return $this->hasMany('App\ClientAdress');
    }
}
