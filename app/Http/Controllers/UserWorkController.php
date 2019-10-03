<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\User;
use App\userWork;
use DB;

class UserWorkController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }
    
    public function addUserWork(){
    	return view('user.workingHistory.addWorkingHistory');
    }

    public function saveUserWork(Request $request){
    	$this->validate($request,[
            'companyName' => 'required',
            'location' => 'required',
            'startingDate' => 'required',
            'website' => 'required',
            // 'endDate' => 'required',
            // 'currentlyWorking' => 'required',
        ]);
         $user = User::find(auth()->id());

         $checked = $request->has('currentlyWorking') ? 1 : 0;


        DB::beginTransaction();
        try {
            $save= userWork::insertGetId([
                'user_id' => $user->id,
                'companyName'=>$request->companyName,
                'location'=>$request->location,
                'startingDate'=>$request->startingDate,
                'website'=>$request->website,
                'endDate'=>$request->endDate,
                'currentlyWorking'=>$checked,
             
            ]);
            if($save){
                DB::commit();
            }else {
                DB::rollback();
            }

        }catch(\Exception $e){
            DB::rollback();
            //return $e;
        }

        return Redirect::to("/editProfile")->with('message','Operation Successful .');
        
    }

    public function editUserWork($id){
    	//$editEducation = userEducation::where('id',$id)->first();
    	 $editUserWork = userWork::find($id);
        return view('user.workingHistory.editWorkingHistory',compact('editUserWork'));
    }

    public function updateWork(Request $request,$Id ){
        $this->validate($request,[
            'companyName' => 'required',
            'location' => 'required',
            'startingDate' => 'required',
            'website' => 'required',
            // 'endDate' => 'required',
            // 'currentlyWorking' => 'required',
        ]);

        $checked = $request->has('currentlyWorking') ? 1 : 0;

        DB::beginTransaction();
        try {
            $update= userWork::where('id',$Id)
                ->update([
                'companyName'=>$request->companyName,
                'location'=>$request->location,
                'startingDate'=>$request->startingDate,
                'website'=>$request->website,
                'endDate'=>$request->endDate,
                'currentlyWorking'=>$checked,
            ]);
            if($update){
                DB::commit();
            }else {
                DB::rollback();
            }

        }catch(\Exception $e){
            DB::rollback();
            //return $e;
        }

        return Redirect::to("/editProfile")->with('message','Operation Successful .');
    }

    public function deleteWork($id){
        
        $userWorks = userWork::find($id);

        $userWorks->delete();
        
        return Redirect::to("/editProfile")->with('message','Operation Successful .');
    }
}
