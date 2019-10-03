<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\userFinancialExam;
use Redirect;
use destroy;

class UserFinancialExamController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       // ->except(['index','show','showall']);
    }
    public function addFinancialExam(){
    	return view('user.financialExam.addFinancialExam');
    }

    public function saveFinancialExam(Request $request){
    	$this->validate($request,[
            'exam_code' => 'required',
            'name' => 'required',
            'passed_date' => 'required',
        ]);
         $user = User::find(auth()->id());


        DB::beginTransaction();
        try {
            $save= userFinancialExam::insertGetId([
                'user_id' => $user->id,
                'exam_code'=>$request->exam_code,
                'name'=>$request->name,
                'passed_date'=>$request->passed_date,
             
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

    public function editFinancialExam($id){
    	
    	 $editFinancialExam = userFinancialExam::find($id);
        return view('user.financialExam.editFinancialExam',compact('editFinancialExam'));
    }

    public function updateFinancialExam(Request $request,$Id ){
        $this->validate($request,[
            'exam_code' => 'required',
            'name' => 'required',
            'passed_date' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $update= userFinancialExam::where('id',$Id)
                ->update([
                'exam_code'=>$request->exam_code,
                'name'=>$request->name,
                'passed_date'=>$request->passed_date,
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


public function deleteFinancialExam( $id){
        
        $userFinancialExam = userFinancialExam::find($id);

        $userFinancialExam->delete();
        
        return Redirect::to("/editProfile")->with('message','Operation Successful .');
    }

   
}
