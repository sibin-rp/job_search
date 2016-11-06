<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QualificationType extends Model
{
    //
  protected $fillable=['id','name','type','qualification','created_at','updated_at'];

//  public function student_qualification(){
//    return $this->belongsTo('App\StudentQualification');
//  }
}
