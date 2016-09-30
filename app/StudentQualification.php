<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentQualification extends Model
{
    //

  protected $fillable = ['id','user_id','college_name','type','link',
  'title','description','completed','started_at','completed_at',
  'mark_type','mark','degree','stream','created_at','updated_at'];

  protected $appends = ['qualification_type','mark_type_name'];

  public function user(){
    return $this->hasOne('App\User');
  }


  public function setMarkAttribute($value){
    $this->attributes['mark'] = floatval($value);
  }

  public function getQualificationTypeAttribute(){
    switch ($this->attributes['type']){
      case '10_th':
        return '10th Standard';
        break;
      case '12_th':
        return '12th Standard';
        break;
      case 'graduation':
        return 'Graduation';
        break;
      case 'post_graduation':
        return 'Post graduation';
        break;
      case 'diploma':
        return 'Diploma Course';
        break;
      case 'phd':
        return 'Phd';
        break;
      case 'academic':
        return 'Academic Details';
        break;
      case 'sports':
        return 'Sports';
        break;
      case 'arts':
        return 'Arts';
        break;
      default;
        return 'Others';
        break;

    }
  }

  public function getMarkTypeNameAttribute(){
    switch ($this->attributes['mark_type']){
      case 'cgpa_10':
        return 'In CGPA 10';
        break;
      case 'cgpa_4':
        return 'In CGPA 4';
        break;
      case 'percentage':
        return 'in Percentage';
        break;
      default:
        return 'In Percentage';
        break;

    }
  }
}
