<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'name', 'orgnbr', 'phone', 'mobile', 'web', 'email', 'bankgiro', 'postgiro', 'info'
    ];


    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function adresses()
    {
        return $this->hasMany('App\ClientAdress');
    }

    public function getActiveAttribute($value){

        if ($value === 1){

            return true;
        }else{
            
            return false;
        }
    }

  	
}
