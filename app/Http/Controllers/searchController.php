<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\userBasic;
use App\userService;
use App\userServiceRelation;


use Illuminate\Http\Request;

class searchController extends Controller
{
    //
    public function create()
    {
    	return view('search.searchResult');
    }

    public function showProfile($id)
    {
        $user= User::find($id);
        $userService = userService::all();
        $services = userServiceRelation::where('user_id',$user->id)->get();
        // return view('user.userProfile',compact('user','services','userService'));

        return view('search.searchProfile',compact('user','services','userService'));

    }

    public function search()
    {

    	$service= request('service');
    	$place= request('place');


        if(!empty($place)&&!empty($service))
        {
            $users=DB::select(DB::raw("select id from users where id in (select user_id from user_basics where city= :place or state =:place1 or zipcode=:place2 and user_id in (select user_id from user_service_relations where user_service_id in (select id from user_services where name = :service ) ))"),array(
            'place'=> $place,
            'place1'=>$place,
            'place2'=>$place,
            'service'=>$service, 

        )); 
        }

       
        elseif(!empty($place))
        {
             $users=DB::select(DB::raw("select id from users where id in (select user_id from user_basics where city= :place or state =:place1 or zipcode=:place2 )"),array(
            'place'=> $place,
            'place1'=>$place,
            'place2'=>$place,

        ));
        }

        elseif(!empty($service))
        {
              $users=DB::select(DB::raw("select id from users where id in (select user_id from user_basics where user_id in (select user_id from user_service_relations where user_service_id in (select id from user_services where name = :service ) ))"),array(
            'service'=>$service,

        ));
        }
        else
        {
            $users=DB::select(DB::raw("select id from users where role_id=:table "),array(
                'table'=>1,

            ));
        }
        
       

       




       // $users = User::where('email','asik@gmail.com')
       // ->paginate(1);
        // $userService= userService::where('name',$service)->limit(1);
        // $userServiceRelation=userServiceRelation::where('user_service_id',$userService->id);
    //    $users= userBasic::where('zipcode',$place)
    //                          ->orWhere('state',$place)
    //                         ->orWhere('userServiceRelation', function ($query) use ($service) {
        
    //     $query->where('name', 'like', '%'.$search.'%');
    // })
 
    //                         ->paginate(1);


        
             $i=0;
             $a[0]=0;
         foreach ($users as $user) {
            $a[$i]=$user->id;
                # code...
            $i++;
            }   

        $users = User::whereIn('id',$a)
       ->paginate(5);
       return view('search.searchResult',compact('users')) ;
       // return $users;
        // return $userServiceRelation;


    }


}
