<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipPreference extends Model
{
    //
  protected $fillable = ['id','user_id','company_type','duration','from_date',
  'to_date','internship_type','stipend_from','stipend_to','city',
  'internship_field_id','created_at','updated_at'];


  protected $appends =['company_type_name',
    'duration_type','work_type_option'];
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

  public function getDurationTypeAttribute(){
    $value = $this->attributes['duration'];
    if(!isset($value) && $value==null){
      return 'Any';
    }
    switch ($value){
      case 'any':
        return 'Any';
        break;
      case '0_3':
        return '0 - 3 Months';
        break;
      case '3_6':
        return '3 - 6 Months';
        break;
      case '6_9':
        return '6 - 9 Months';
        break;
      case '9_12':
        return '9 - 12 Months';
        break;
      case '1+':
        return 'More than 1 Year';
        break;
      default:
        return 'Any';
        break;
    }
  }

  public function getWorkTypeOptionAttribute(){
    $value = $this->attributes['internship_type'];
    if(!isset($value) && $value==null){
      return 'Any';
    }
    switch ($value){
      case 'any':
        return 'Any';
        break;
      case 'full_time_office':
        return 'Full Time Office Work';
        break;
      case 'full_time_home':
        return 'Work from Home (Full time)';
        break;
      case 'part_time_office':
        return 'Part Time Office Work';
        break;
      case 'part_time_home':
        return 'Work from Home (Part time)';
        break;
      default:
        return 'Any';
        break;
    }
  }
}
