<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //


  protected $fillable = ['id','name','information','website','address','email',
  'phone','user_id','industry','logo','linkedin_id','organization_type','city',
  'state'];

  protected $appends = ['state_name'];

  public  function internships(){
    return $this->hasMany('App\Internship');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function getStateNameAttribute(){
    $state_code = $this->attributes['state'];
    $states = Helpers::getStates();
    if(!isset($state_code) && $state_code==null){
      return "";
    }
    return array_get($states,$state_code);
  }


}
