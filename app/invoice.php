<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    //
    protected $guarded=[];
    public function quotationRequest()
    {
        return $this->belongsTo('App\quotationRequest');
    }
    public function transaction()
    {
      return $this->hasOne('App\transaction');
    }

}
