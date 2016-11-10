<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    //

  protected $fillable = ['id','internship_id','degree','stream','mark','mark_type','created_at','updated_at','qualification'];

  protected $append = ['mark_type_name','qualification_name','stream_name','degree_name'];

  public function internship(){
    return $this->belongsTo('App\Internship');
  }


  public function getStreamNameAttribute(){
    $value = $this->attributes['stream'];
    try{
      return QualificationType::find($value)->name;
    }catch (\Exception $e){
      return $e->getMessage();
    }
  }

  public function getDegreeNameAttribute(){
    $value = $this->attributes['degree'];
    try{
      return QualificationType::find($value)->name;
    }catch (\Exception $e){
      return $e->getMessage();
    }
  }

  public function getMarkTypeNameAttribute(){
    switch($this->attributes['mark_type']){
      case "cgpa_4":
        return 'CGPA 4';
        break;
      case 'cgpa_10':
        return 'CGPA 10';
        break;
      case 'percentage':
        return  'Percentage';
        break;
      default:
        return null;
        break;
    }
  }

  public function getQualificationNameAttribute(){
    switch($this->attributes['qualification']){
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
        return 'Diploma';
        break;
      case 'phd':
        return 'PHd';
        break;
      default:
        return 'Any';
        break;
    }
  }
}
