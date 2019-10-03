<?php

namespace App\Http\Controllers;

use App\place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }

    public function create()
    {
        $place= place::get();
        return view('place.create',compact('place'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',

        ]);

        //$user= User::find($id);
        $place = new place();
        $place->city=$request->city;
        $place->state=$request->state;
        $place->zipcode=$request->zipcode;
        $place->save();
        return redirect('/placeCreate')->with('message','Operation Successful .');

    }



    public function view(){
        $place= place::get();
        return view('place.searchView',compact('place'));

    }

    public function delete($id)
    {
                $place= place::find($id);
                $place->delete();

                return redirect('/placeCreate')->with('message','Operation Successful .');

      
    }
}
