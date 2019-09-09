<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quotationRequest extends Model
{
    //
    protected $guarded=[];

  public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function quotationStatus()
    {
        return $this->belongsTo('App\quotationStatus');
    }

}
