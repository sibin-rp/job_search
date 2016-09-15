<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //

  public $table ='experiences';
  protected $fillable = ['id','user_id','experience_type','company_name',
  'internship_field_id','work_type','work_from','work_to','stipend',
  'salary','job_description','location','organization','link','certificate','mark'];


  public function user(){
    return $this->belongsTo('App\User');
  }

  public function setWorkFromAttribute($value){
    $this->attributes['work_from'] = $this->validateDateString($value);
  }
  public function setWorkToAttribute($value){
    $this->attributes['work_to'] = $this->validateDateString($value);
  }

  // Private

  private function validateDateString($value){
    $checkDate = \DateTime::createFromFormat('Y-m-d',$value);
    return $checkDate == $value?$value:null;
  }
}
