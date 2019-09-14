<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class credit extends Model
{
    //
    protected $guarded=[];

    public function user()
    {
    	# code...
    	return $this->belongsTo('App\User');
    }
}
