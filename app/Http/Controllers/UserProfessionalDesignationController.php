<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userProfessionalDesignation;
use DB;
use App\User;
use Redirect;

class UserProfessionalDesignationController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }
    
    public function addProfessionalDesignation(){
    	return view('user.professionalDesignation.addProfessionalDesignation');
    }

    public function saveProfessionalDesignation(Request $request){
    	$this->validate($request,[
            'title' => 'required',
            'short_description' => 'required',
        ]);
        $user = User::find(auth()->id());


        DB::beginTransaction();
        try {
            $save= userProfessionalDesignation::insertGetId([
                'user_id' => $user->id,
                'title'=>$request->title,
                'short_description'=>$request->short_description,
             
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

        return Redirect::to("/editProfile");
        
    }

    public function editProfessionalDesignation($id){
    	//$editEducation = userEducation::where('id',$id)->first();
    	 $editProfessionalDesignation = userProfessionalDesignation::find($id);
        return view('user.professionalDesignation.editProfessionalDesignation',compact('editProfessionalDesignation'));
    }

    public function updateDesignation(Request $request,$Id ){
        $this->validate($request,[
            'title' => 'required',
            'short_description' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $update= userProfessionalDesignation::where('id',$Id)
                ->update([
                'title'=>$request->title,
                'short_description'=>$request->short_description,
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

        return Redirect::to("/editProfile");
    }

    public function deleteProfessionalDesignation( $id){
        
        $userProfessionalDesignation = userProfessionalDesignation::find($id);

        $userProfessionalDesignation->delete();
        
        return Redirect::to("/editProfile");
    }
    
}
