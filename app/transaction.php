<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    //
    protected $guarded=[];
    public function invoice()
    {
        return $this->belongsTo('App\invoice');
    }
}
