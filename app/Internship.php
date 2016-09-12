<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    //
  protected $fillable = ['id'];

  public function skills(){
    return $this->belongsToMany('App\Skill')->withPivot(['expertise_level']);
  }

  public function company(){
    return $this->belongsTo('App\Company');
  }

  public function qualification(){
    return $this->hasOne('App\Qualification');
  }
}
