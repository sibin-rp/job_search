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

  protected $appends =['duration_type','work_type_option','internship_field_data','state_name'
  ,'payment_details'];

  public function skills(){
    return $this->belongsToMany('App\Skill')->withPivot(['expertise_level']);
  }

  public function company(){
    return $this->belongsTo('App\Company');
  }

  public function qualification(){
    return $this->hasOne('App\Qualification');
  }

  public function internship_field(){
    return $this->belongsTo('App\InternshipField');
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
    $value = $this->attributes['type'];
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

  public function getStateNameAttribute(){
    $state_code = $this->attributes['state'];
    $states = Helpers::getStates();
    if(!isset($state_code) && $state_code==null){
      return "";
    }
    return array_get($states,$state_code);
  }


  public function getPaymentDetailAttribute(){
    $value = $this->attributes['payment'];
    if(!isset($value) && $value == null){
      return "No Payment details are saved";
    }
  }

  public function setEligibleMinAttribute($value){
    $this->attributes['eligible_min'] = (isset($value) && $value!="")?$value:21;
  }
  public function setEligibleMaxAttribute($value){
    $this->attributes['eligible_max'] = (isset($value) && $value!="")?$value: 35;
  }

}
