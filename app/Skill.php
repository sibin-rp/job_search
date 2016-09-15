<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
  protected $fillable = ['id','name','internship_field_id'];
  public  $timestamps = false;

  public function internship_field(){
    return $this->hasOne('App\InternshipField');
  }


  public function internships(){
    return $this->belongsToMany('App\Internship')->withPivot(['expertise_level']);
  }

  public function internship_preferences(){
    return $this->belongsToMany('App\InternshipPreference')->withPivot('expertise');
  }
}
