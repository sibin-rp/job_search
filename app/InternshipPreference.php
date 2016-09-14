<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipPreference extends Model
{
    //
  protected $fillable = ['id','user_id','company_type','duration','from_date',
  'to_date','internship_type','stipend_from','stipend_to','city',
  'internship_field_id','created_at','updated_at'];


  public function user(){
    return $this->belongsTo('App\User');
  }
}
