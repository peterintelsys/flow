<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'client_id', 'uuid', 'client_uuid', 'role_id', 'role_uuid', 'superadmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function roles()
    {
        return $this
        ->belongsToMany('App\Role')
        ->withTimestamps();
    }


    public function authRoles($roles){
    
    if ($this->hasAnyRole($roles)) {
    return true;
    }
    abort(401, 'Du har inte behörighet för denna funktion.');
    }


    public function hasAnyRole($roles){
    
    if (is_array($roles)) {
    foreach ($roles as $role) {
      if ($this->hasRole($role)) {
        return true;
        }
        }
    } else {
        if ($this->hasRole($roles)) {
        return true;
        }
    }
    return false;
    }

    public function hasRole($role){
    
    if ($this->roles()->where('name', $role)->first()) {
        return true;
    }
    return false;
    }

    public function getActiveAttribute($value){

        if ($value === 1){

            return true;
        }else{
            
            return false;
        }
    }
}
