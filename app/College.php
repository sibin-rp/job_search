<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*-----------------------------------------------------
TABLE : colleges
-------------------------------------------------------
     COLUMN      |     TYPE    | NULLABLE
-------------------------------------------------------
Name             | String      | NO
State            | String      | YES
City             | String      | YES
Phone            | String      | YES
Email            | String      | YES
About            | Text        | YES
-------------------------------------------------------*/


class College extends Model
{
    //
  protected $fillable = ['id','name','state','city','phone','email',
  'about','address','crated_at', 'updated_at'];

  protected $appends = ['state_name'];


  public function getStateNameAttribute(){
    try{
      $states = Helpers::getStates();
      $selected = $this->attributes['state'];
      return $states[$selected];
    }catch (\Exception $e){
      return 'Delhi';
    }
  }
}
