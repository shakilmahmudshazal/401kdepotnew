<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotationStatusController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }
}
