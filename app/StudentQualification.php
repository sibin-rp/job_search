<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentQualification extends Model
{
    //

  protected $fillable = ['id','user_id','college_name','type','link',
  'title','description','completed','started_at','completed_at',
  'mark_type','mark','degree','stream','created_at','updated_at'];


  public function user(){
    return $this->hasOne('App\User');
  }


  public function setMarkAttribute($value){
    $this->attributes['mark'] = floatval($value);
  }
}
