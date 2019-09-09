<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quotationStatus extends Model
{
    //
    protected $guarded=[];
    public function quotationRequest()
    {
      return $this->hasMany('App\quotationRequest');
    }
}
