<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //

  public $table ='experiences';
  protected $fillable = ['id','user_id','experience_type','company_name',
  'internship_field_id','work_type','work_from','work_to','stipend',
  'salary','title','job_description','location','organization','link','certificate','mark'];

  protected $append = ['experience_type_name'];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function internship_field(){
    return $this->belongsTo('App\InternshipField');
  }
  public function setWorkFromAttribute($value){
    $this->attributes['work_from'] = $this->validateDateString($value);
  }
  public function setWorkToAttribute($value){
    $this->attributes['work_to'] = $this->validateDateString($value);
  }

  public function getExperienceTypeNameAttribute(){
    try{
      $type_array =[
        'project' => 'Project',
        'freelance' => 'Freelance',
        'training' => 'Training',
        'other' => 'Other',
        'job' => 'Job',
        'internship' => 'Internship'
      ];

      return $type_array[$this->attributes['experience_type']];
    }catch (\Exception $e){
      return 'Other';
    }
  }

  // Private

  private function validateDateString($value){
    $checkDate = Carbon::createFromFormat('Y-m-d',$value);
    $checkDate = $checkDate->format('Y-m-d');
    return $checkDate == $value?$value:null;
  }


}
