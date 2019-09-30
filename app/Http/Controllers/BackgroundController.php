<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\background;
use Carbon\Carbon;

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

    public function reset()
    {
        $background= background::truncate();
        return redirect()->back();

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


    //background image
    public function saveBackgroundImage(Request $request){

        $this->validate($request,[ 
            
            'backgroundImage'=>'required'
        ]);
        $backgroundImage = $request->file('backgroundImage');
        // $slug = str_slug($request->profile_name);
        // $slug = str_slug(auth()->id());
        if (isset($backgroundImage)){
            $currentDate=Carbon::now()->toDateString();
            $picname= $currentDate.'-'.uniqid().'.'.
            $backgroundImage->getClientOriginalExtension();

            $background= background::first();
            $background->backgroundImage=$picname;
            
            
            $background->save();
            // $profile=userProfilePic::find(auth()->id());
            // // $profile->user_id=auth()->id();
            // $profile->profile_pic=$picname;
            // $profile->save();

            if (!file_exists('uploads/backgroundImage')){
                mkdir('uploads/backgroundImage',0777,true);
            }
            $backgroundImage->move('uploads/backgroundImage',$picname);
        }
        else{
            $picname="default.png";
        }
         // $profile= new userProfilePic();
        // $profile->user_id=auth()->id();
        // $profile->profile_pic=$picname;
        // $profile->save();

        


       return redirect()->back();
    }

    //slide One Image
    public function saveSlideOneImage(Request $request){

        $this->validate($request,[ 
            
            'slideOneImage'=>'required'
        ]);
        $slideOneImage = $request->file('slideOneImage');
        // $slug = str_slug($request->profile_name);
        // $slug = str_slug(auth()->id());
        if (isset($slideOneImage)){
            $currentDate=Carbon::now()->toDateString();
            $picname= $currentDate.'-'.uniqid().'.'.
            $slideOneImage->getClientOriginalExtension();

            $background= background::first();
            $background->slideOneImage=$picname;
            
            
            $background->save();
            // $profile=userProfilePic::find(auth()->id());
            // // $profile->user_id=auth()->id();
            // $profile->profile_pic=$picname;
            // $profile->save();

            if (!file_exists('uploads/backgroundImage')){
                mkdir('uploads/backgroundImage',0777,true);
            }
            $slideOneImage->move('uploads/backgroundImage',$picname);
        }
        else{
            $picname="default.png";
        }
         // $profile= new userProfilePic();
        // $profile->user_id=auth()->id();
        // $profile->profile_pic=$picname;
        // $profile->save();

        


       return redirect()->back();
    }

    //slideTwo
    public function saveSlideTwoImage(Request $request){

        $this->validate($request,[ 
            
            'slideTwoImage'=>'required'
        ]);
        $slideTwoImage = $request->file('slideTwoImage');
        // $slug = str_slug($request->profile_name);
        // $slug = str_slug(auth()->id());
        if (isset($slideTwoImage)){
            $currentDate=Carbon::now()->toDateString();
            $picname= $currentDate.'-'.uniqid().'.'.
            $slideTwoImage->getClientOriginalExtension();

            $background= background::first();
            $background->slideTwoImage=$picname;
            
            
            $background->save();
            // $profile=userProfilePic::find(auth()->id());
            // // $profile->user_id=auth()->id();
            // $profile->profile_pic=$picname;
            // $profile->save();

            if (!file_exists('uploads/backgroundImage')){
                mkdir('uploads/backgroundImage',0777,true);
            }
            $slideTwoImage->move('uploads/backgroundImage',$picname);
        }
        else{
            $picname="default.png";
        }
         // $profile= new userProfilePic();
        // $profile->user_id=auth()->id();
        // $profile->profile_pic=$picname;
        // $profile->save();

        


       return redirect()->back();
    }

    //slide three
    public function saveSlideThreeImage(Request $request){

        $this->validate($request,[ 
            
            'slideThreeImage'=>'required'
        ]);
        $slideThreeImage = $request->file('slideThreeImage');
        // $slug = str_slug($request->profile_name);
        // $slug = str_slug(auth()->id());
        if (isset($slideThreeImage)){
            $currentDate=Carbon::now()->toDateString();
            $picname= $currentDate.'-'.uniqid().'.'.
            $slideThreeImage->getClientOriginalExtension();

            $background= background::first();
            $background->slideThreeImage=$picname;
            
            
            $background->save();
            // $profile=userProfilePic::find(auth()->id());
            // // $profile->user_id=auth()->id();
            // $profile->profile_pic=$picname;
            // $profile->save();

            if (!file_exists('uploads/backgroundImage')){
                mkdir('uploads/backgroundImage',0777,true);
            }
            $slideThreeImage->move('uploads/backgroundImage',$picname);
        }
        else{
            $picname="default.png";
        }
         // $profile= new userProfilePic();
        // $profile->user_id=auth()->id();
        // $profile->profile_pic=$picname;
        // $profile->save();

        


       return redirect()->back();
    }
//div one image
    public function saveDivOneImage(Request $request){

        $this->validate($request,[ 
            
            'divOneImage'=>'required'
        ]);
        $divOneImage = $request->file('divOneImage');
        // $slug = str_slug($request->profile_name);
        // $slug = str_slug(auth()->id());
        if (isset($divOneImage)){
            $currentDate=Carbon::now()->toDateString();
            $picname= $currentDate.'-'.uniqid().'.'.
            $divOneImage->getClientOriginalExtension();

            $background= background::first();
            $background->divOneImage=$picname;
            
            
            $background->save();
            // $profile=userProfilePic::find(auth()->id());
            // // $profile->user_id=auth()->id();
            // $profile->profile_pic=$picname;
            // $profile->save();

            if (!file_exists('uploads/backgroundImage')){
                mkdir('uploads/backgroundImage',0777,true);
            }
            $divOneImage->move('uploads/backgroundImage',$picname);
        }
        else{
            $picname="default.png";
        }
         // $profile= new userProfilePic();
        // $profile->user_id=auth()->id();
        // $profile->profile_pic=$picname;
        // $profile->save();

        


       return redirect()->back();
    }

    //div two
     public function saveDivTwoImage(Request $request){

        $this->validate($request,[ 
            
            'divTwoImage'=>'required'
        ]);
        $divTwoImage = $request->file('divTwoImage');
        // $slug = str_slug($request->profile_name);
        // $slug = str_slug(auth()->id());
        if (isset($divTwoImage)){
            $currentDate=Carbon::now()->toDateString();
            $picname= $currentDate.'-'.uniqid().'.'.
            $divTwoImage->getClientOriginalExtension();

            $background= background::first();
            $background->divTwoImage=$picname;
            
            
            $background->save();
            // $profile=userProfilePic::find(auth()->id());
            // // $profile->user_id=auth()->id();
            // $profile->profile_pic=$picname;
            // $profile->save();

            if (!file_exists('uploads/backgroundImage')){
                mkdir('uploads/backgroundImage',0777,true);
            }
            $divTwoImage->move('uploads/backgroundImage',$picname);
        }
        else{
            $picname="default.png";
        }
         // $profile= new userProfilePic();
        // $profile->user_id=auth()->id();
        // $profile->profile_pic=$picname;
        // $profile->save();

        


       return redirect()->back();
    }

    //div three
    public function saveDivThreeImage(Request $request){

        $this->validate($request,[ 
            
            'divThreeImage'=>'required'
        ]);
        $divThreeImage = $request->file('divThreeImage');
        // $slug = str_slug($request->profile_name);
        // $slug = str_slug(auth()->id());
        if (isset($divThreeImage)){
            $currentDate=Carbon::now()->toDateString();
            $picname= $currentDate.'-'.uniqid().'.'.
            $divThreeImage->getClientOriginalExtension();

            $background= background::first();
            $background->divThreeImage=$picname;
            
            
            $background->save();
            // $profile=userProfilePic::find(auth()->id());
            // // $profile->user_id=auth()->id();
            // $profile->profile_pic=$picname;
            // $profile->save();

            if (!file_exists('uploads/backgroundImage')){
                mkdir('uploads/backgroundImage',0777,true);
            }
            $divThreeImage->move('uploads/backgroundImage',$picname);
        }
        else{
            $picname="default.png";
        }
         // $profile= new userProfilePic();
        // $profile->user_id=auth()->id();
        // $profile->profile_pic=$picname;
        // $profile->save();

        


       return redirect()->back();
    }
    //div four
     public function saveDivFourImage(Request $request){

        $this->validate($request,[ 
            
            'divFourImage'=>'required'
        ]);
        $divFourImage = $request->file('divFourImage');
        // $slug = str_slug($request->profile_name);
        // $slug = str_slug(auth()->id());
        if (isset($divFourImage)){
            $currentDate=Carbon::now()->toDateString();
            $picname= $currentDate.'-'.uniqid().'.'.
            $divFourImage->getClientOriginalExtension();

            $background= background::first();
            $background->divFourImage=$picname;
            
            
            $background->save();
            // $profile=userProfilePic::find(auth()->id());
            // // $profile->user_id=auth()->id();
            // $profile->profile_pic=$picname;
            // $profile->save();

            if (!file_exists('uploads/backgroundImage')){
                mkdir('uploads/backgroundImage',0777,true);
            }
            $divFourImage->move('uploads/backgroundImage',$picname);
        }
        else{
            $picname="default.png";
        }
         // $profile= new userProfilePic();
        // $profile->user_id=auth()->id();
        // $profile->profile_pic=$picname;
        // $profile->save();

        


       return redirect()->back();
    }
}
