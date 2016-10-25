<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    //

  protected $fillable = ['id','internship_id','degree','stream','mark','mark_type','created_at','updated_at','qualification'];

  public function internship(){
    return $this->belongsTo('App\Internship');
  }


}
