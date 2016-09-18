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
        'email', 'password','username','type','active','admin','super_admin',
        'profile_image','token','alternate_contact','alternate_email','describe',
        'dob','first_name','last_name','home_address','home_state','live_address',
        'live_state','phone_no','role','sex','created_at','updated_at'
    ];

    protected $appends = ['name'];
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

    public function student_qualifications(){
      return $this->hasMany('App\StudentQualification');
    }

    public function experiences(){
      return $this->hasMany('App\Experience');
    }

    public function getNameAttribute(){
      $first_name = $this->attributes['first_name'];
      $last_name  = $this->attributes['last_name'];
      if(!$first_name && !$last_name) return "Not available";
      return $first_name.' '.$last_name;
    }

}
