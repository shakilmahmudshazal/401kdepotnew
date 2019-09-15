<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutocompleteController extends Controller
{
    //for create controller - php artisan make:controller AutocompleteController

    function index()
    {
     return view('place.autocomplete');
    }

    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('places')
        ->where('city', 'LIKE', "%{$query}%")
        ->orwhere('state', 'LIKE', "%{$query}%")

        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->city.'</a></li>
       ';
       $output .= '
       <li><a href="#">'.$row->state.'</a></li>
       ';

      }
      $output .= '</ul>';
      echo $output;
     }
    }

}
