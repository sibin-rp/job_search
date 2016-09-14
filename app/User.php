<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
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
        'name', 'email', 'password','username','type','active','admin','super_admin',
        'profile_image','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','token'
    ];


    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }


    public function company(){
      return $this->hasOne('App\Company');
    }

    public function internship_preferences(){
      return $this->hasMany('App\InternshipPreference');
    }
}
