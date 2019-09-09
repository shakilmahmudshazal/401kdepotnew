<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userService extends Model
{
    //
    protected $guarded=[];
    public function userService()
    {
      return $this->hasMany('App\userServiceRelation');
    }
}
