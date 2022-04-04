<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    public function getDetails($id){
        $data = DB::select('select *from zzz where id = ?', [$id]);
        return view('employeeEdit',['data'=> $data]);
    }
        
    
    public function postEmployeeDetails($id){
        $details=new Info;
        $details->save();
        $data = DB::select('select *from zzz where id = ?', [$id]);
        return view('employeeEdit',['data'=> $data]);
    }
    
// public function show($id){
//     $data = DB::select('select *from zzz where id = ?', [$id]);
//     return view('showTeamDetails',['data'=> $data]);
// }

//EDIT

public function index(){
// $users = DB::select('select * from zzz');
$users = DB::table('zzz')->paginate(4);
return view('updateEmp',['users'=>$users]);
}
public function show($id) {
$users = DB::select('select * from zzz where id = ?',[$id]);
return view('update',['users'=>$users]);
}
public function edit(Request $request,$id) {
$email = $request->input('email');
$password = $request->input('psw');
$team = $request->input('team');
$designation = $request->input('designation');

DB::update('update zzz set email=?, password = ?,team=?,designation=? where id = ?',[$email,$password,$team,$designation,$id]);
echo "Record updated successfully.";

}

//AFTER EMPLOYEE LOGIN
public function viewProfile($id){
    $users = DB::select('select * from zzz where id = ?',[$id]);
    return view('viewProfile',['users'=>$users]); 
}

public function myTeam($team){
    $users = DB::select('select * from zzz where team = ?',[$team]);
    return view('myteam',['users'=>$users]); 
}
// public function postmyteam(Request $request){
//   $search=$request->input('search');
//   $email=$request->input('email');
//   $users = DB::select('select * from zzz where $search = ?', [$email]);
//   return view('newPage',['users'=>$users]); 
// }
}


