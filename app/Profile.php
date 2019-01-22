<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
      protected $guarded = array('profile_id');

      public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
      );

      // public function profilehistories()
      // {
      //   return $this->hasMany('App\ProfileHistory');
      // }
}
