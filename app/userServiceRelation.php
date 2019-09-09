<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userServiceRelation extends Model
{
    //
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function userService()
    {
        return $this->belongsTo('App\userService');
    }

    // public function checkRelation()
    // {
    // 	$user= $this::where('user_id',$user_id)->where('user_service_id',$user_service_id)->count();
    // 	return $user;

    // }


}
