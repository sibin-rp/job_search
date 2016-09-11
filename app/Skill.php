<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
  protected $fillable = ['id','name','internship_field_id'];


  public function internship_field(){
    return $this->hasOne('App\InternshipField');
  }


  public function internships(){
    return $this->belongsToMany('App\Skill')->withPivot(['expertise_level']);
  }
}
