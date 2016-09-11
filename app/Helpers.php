<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Helpers extends Model
{
    //

  public static  function getStates(){
    return [
      'AP'  => 'Andra Pradesh',
      'AR'  => 'Arunachal Pradesh',
      'AS'  => 'Assam',
      'BR'  => 'Bihar',
      'CT'  => 'Chhattisgarh',
      'GA'  => 'GOA',
      'GJ'  => 'Gujarat',
      'HR'  => 'Haryana',
      'HP'  => 'Himachal Pradesh',
      'JK'  => 'Jammu and Kashmir',
      'JH'  => 'Jharkhand',
      'KA'  => 'Karnataka',
      'KL'  => 'Kerala',
      'MP'  => 'Madhya Pradesh',
      'MN'  => 'Manipur',
      'ML'  => 'Meghalaya',
      'MZ'  => 'Mizoram',
      'NZ'  => 'Nagaland',
      'OD'  => 'Odisha',
      'PB'  => 'Punjab',
      'RJ'  => 'Rajasthan',
      'SK'  => 'Sikkim',
      'TN'  => 'Tamil Nadu',
      'TG'  => 'Telangana',
      'TR'  => 'Tripura',
      'UP'  => 'Uttar Pradesh',
      'UT'  => 'Uttarakhand',
      'WB'  => 'West Bengal'
    ];
  }
}
