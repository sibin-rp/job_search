<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipPreference extends Model
{
    //
  protected $fillable = ['id','user_id','company_type','duration','from_date',
  'to_date','internship_type','stipend_from','stipend_to','city',
  'internship_field_id','created_at','updated_at'];


  protected $appends =['company_type_name','internship_type_name'];
  public function user(){
    return $this->belongsTo('App\User');
  }


  public function skills(){
    return $this->belongsToMany('App\Skill')->withPivot('expertise');
  }


  public function internship_field(){
    return $this->belongsTo('App\InternshipField');
  }
  public function setStipendFromAttribute($value){
    $this->attributes['stipend_from'] = (isset($value) && $value!="")?floatval($value):null;
  }

  public function setStipendToAttribute($value){
    $this->attributes['stipend_to'] = (isset($value) && $value!="")?floatval($value):null;
  }

  public function setCityAttribute($value){
    $insert_value = $value;
    if(is_array($value)){
      $insert_value = implode(",",$value);
    }
    $this->attributes['city'] = $insert_value;
  }

  public function getCompanyTypeNameAttribute(){
    $type = $this->attributes['company_type'];
    switch ($type){
      case 'any':
        return 'Any Company';
        break;
      case 'startup':
        return 'Start Up Company';
        break;
      case 'mnc':
        return 'Multi National Company';
        break;
      default:
        return 'Default';
        break;
    }
  }
}
