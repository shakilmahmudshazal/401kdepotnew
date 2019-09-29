<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\background;

class BackgroundController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }

    public function index()
    {
    	$background= background::first();
    	return view('backgroundEdit',compact('background'));

    }

    public function edit()
    {
    	$background= background::first();
    	if(empty($background))
    	{
    		$background=background::create([
    			'id'=>'1'

    		]);

    	}

    	if(request('headline'))
    	{
    		$background->headline=request('headline');

    	}
    	if(request('details'))
    	{
    		$background->details=request('details');

    	}
    	if(request('slideOneHeadline'))
    	{
    		$background->slideOneHeadline=request('slideOneHeadline');

    	}
    	if(request('slideOneDetails'))
    	{
    		$background->slideOneDetails=request('slideOneDetails');

    	}
    	if(request('slideOneLinks'))
    	{
    		$background->slideOneLinks=request('slideOneLinks');

    	}
    	if(request('slideTwoHeadline'))
    	{
    		$background->slideTwoHeadline=request('slideTwoHeadline');

    	}
    	if(request('slideTwoDetails'))
    	{
    		$background->slideTwoDetails=request('slideTwoDetails');

    	}
    	if(request('slideTwoLinks'))
    	{
    		$background->slideTwoLinks=request('slideTwoLinks');

    	}
if(request('slideThreeHeadline'))
    	{
    		$background->slideThreeHeadline=request('slideThreeHeadline');

    	}
    	if(request('slideThreeDetails'))
    	{
    		$background->slideThreeDetails=request('slideThreeDetails');

    	}
    	if(request('slideThreeLinks'))
    	{
    		$background->slideThreeLinks=request('slideThreeLinks');

    	}

    	

    	if(request('divOneHeadline'))
    	{
    		$background->divOneHeadline=request('divOneHeadline');

    	}
    	if(request('divOneDetails'))
    	{
    		$background->divOneDetails=request('divOneDetails');

    	}

    	if(request('divTwoHeadline'))
    	{
    		$background->divTwoHeadline=request('divTwoHeadline');

    	}
    	if(request('divTwoDetails'))
    	{
    		$background->divTwoDetails=request('divTwoDetails');

    	}

    	if(request('divThreeHeadline'))
    	{
    		$background->divThreeHeadline=request('divThreeHeadline');

    	}
    	if(request('divThreeDetails'))
    	{
    		$background->divThreeDetails=request('divThreeDetails');

    	}
    	if(request('divFourHeadline'))
    	{
    		$background->divFourHeadline=request('divFourHeadline');

    	}
    	if(request('divFourDetails'))
    	{
    		$background->divFourDetails=request('divFourDetails');

    	}


    	$background->save();

    	return redirect()->back();


    }
}
