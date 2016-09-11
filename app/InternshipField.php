<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipField extends Model
{
    //

  protected  $fillable = ['id','name','information'];

  public function skills(){
    return $this->hasMany('App\Skill');
  }
}
