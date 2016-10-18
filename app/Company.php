<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //


  protected $fillable = ['id','name','information','website','address','email',
  'phone','user_id','industry','logo','linkedin_id','organization_type','city',
  'state'];

  protected $appends = ['state_name','organization_type_name','industry_type'];

  public  function internships(){
    return $this->hasMany('App\Internship');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function getStateNameAttribute(){
    $state_code = $this->attributes['state'];
    $states = Helpers::getStates();
    if(!isset($state_code) && $state_code==null){
      return "";
    }
    return array_get($states,$state_code);
  }

  public function getOrganizationTypeNameAttribute(){
    $type = $this->attributes['organization_type'];
    switch ($type){
      case 'any':
        return 'Any Company';
        break;
      case 'start_up':
        return 'Start Up Company';
        break;
      case 'ngo':
        return 'NGO';
        break;
      case 'mnc':
        return 'Multi National Company';
        break;
      case 'other':
        return 'Other';
        break;
      case 'non_profit':
        return 'Non Profit';
        break;
      default:
        return 'Other';
        break;
    }
  }

  public function getIndustryTypeAttribute(){
    $type = $this->attributes['industry'];
    try{
      return InternshipField::find($type)->name;
    }catch (\Exception $e){
      return 'Default';
    }

  }

}
