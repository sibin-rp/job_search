<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    //
  protected $fillable = ['id','company_id','title','description','stipend_from','stipend_to',
    'duration','type','company_id','internship_field_id','city','state','eligible_min',
    'eligible_max','num_resume','per_rec_exercise','payment','validity',
    'created_at','updated_at'];

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
