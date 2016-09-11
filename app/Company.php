<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //


  protected $fillable = ['id','name','information','website','address','email',
  'phone','user_id','industry','logo','linkedin_id','organization_type','city',
  'state'];


  public  function internships(){
    return $this->hasMany('App\Internship');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }


}
