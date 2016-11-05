<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoTracker extends Model
{
    //
  protected $fillable = ['form_id','form_data','id','created_at','updated_ar'];


  public function setFormDataAttribute($value){
    $this->attributes['form_data'] = json_encode($value);
  }
}
