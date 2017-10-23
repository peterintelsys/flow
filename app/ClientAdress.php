<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientAdress extends Model
{
    //

    public function adresstype()
    {
        return $this->belongsTo('App\AdressType');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
