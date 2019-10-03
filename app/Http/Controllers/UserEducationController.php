<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\userEducation;
use Redirect;
class UserEducationController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }
    public function addEducation(){
    	return view('user.education.addEducation');
    }

    public function saveEducation(Request $request){
    	$this->validate($request,[
            'degree' => 'required',
            'school' => 'required',
            'major' => 'required',
            'graduationDate' => 'required',
        ]);
        $user = User::find(auth()->id());

        
            $userEducation= userEducation::insert([
                'user_id' => $user->id,
                'degree'=>$request->degree,
                'school'=>$request->school,
                'major'=>$request->major,
                'graduationDate' => $request->graduationDate,
            ]);
            

        

        return Redirect::to("/editProfile")->with('message','Operation Successful .');
        
    }

    public function editEducation($id){
    	//$editEducation = userEducation::where('id',$id)->first();
    	 $editEducation = userEducation::find($id);
        return view('user.education.editEducation',compact('editEducation'));
    }

    public function updateEducation(Request $request,$Id ){
    	$this->validate($request,[
            'degree' => 'required',
            'school' => 'required',
            'major' => 'required',
            'graduationDate' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $update= userEducation::where('id',$Id)
                ->update([
                'degree'=>$request->degree,
                'school'=>$request->school,
                'major'=>$request->major,
                'graduationDate' => $request->graduationDate,
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

    public function deleteUserEducation( $id){
        
        $userEducation = userEducation::find($id);

        $userEducation->delete();
        
        return Redirect::to("/editProfile")->with('message','Operation Successful .');
    }
      


}


