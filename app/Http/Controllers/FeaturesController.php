<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use Illuminate\Support\Facades\DB;

use Session;

use Illuminate\Validation\Rule;

// use App\Http\Controllers\Validator;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{
    public function addUser(){
        return view('addUser');
    }
        public function addUserPost(Request $request)
        {
        $this->validate($request, [
            'email' => 'required|email'
            // 'email' => 'required|unique:posts|max:255',
            // 'psw' => 'required_with:password_confirmation|same:psw-repeat',
            // 'psw' => 'required|psw',
            // 'psw-repeat' => 'required|psw_repeat'
            
    
        ]);
      
        // print_r($request->input('email'));
        // $name = $request->input('email');
        // return $request->all();
    
        $info=new Info;
        
        $info->email=$request->input('email');
    
        $info->password=$request->input('psw');
    
        // $info->team=$request->input('team');
    
        // $info->designation=$request->input('designation');
        $info->save();   
        return "NEW USER ADDED";
    }
    
    public function showUsers(){

        $u=new Info;
        

    }
    public function showUserDetails(Request $request)
{
      $u=new Info;
      $email=$request->input('email');
      DB::delete('delete from zzz where email = ?',[$email]);
      $u->save();
    //   $users = DB::table('zzz')->simplePaginate(5);
    
  
}

public function edit(Request $request,$id){

    $user=new Info;
    $newemail=$request->input('email');
    $newpassword=$request->input('psw');
    
    $newteam=$request->input('team');
    $newdesignation=$request->input('designation');
    DB::update('update zzz set email = ?,password=?,team=?,designation=? where id = ?',[$newemail,$newpassword,$newteam,$newdesignation,$id]);
    $user->save();
    
}

public function destroy($id)
{
    
    DB::delete('delete from zzz where id = ?',[$id]);

    return view('features');
}
public function getClick($id){
    $data = DB::select('select *from zzz where id = ?', [$id]);
    return view('edit',['data'=> $data]);

}

public function show($id){
    $data = DB::select('select *from zzz where id = ?', [$id]);
    return view('employeeEdit',['data'=> $data]);
}
public function postShow(Request $request,$id){
    $user=new Info;
    $newemail=$request->input('email');
    $newpassword=$request->input('psw');
    
    $newteam=$request->input('team');
    $newdesignation=$request->input('designation');
    // DB::table('zzz')->where('id',$id)->delete();
    
    // DB::table('zzz')->where('id',$id)->update(['email' => $newemail, 'password' => $newpassword,'team' => $newteam,'designation' => $newdesignation]);
    // DB::update('update zzz set password=?, team=?, designation=? where email = ?',[$newpassword,$newteam,$newdesignation,$newemail]);
    // $user->save();
       
    $data = DB::select('select *from zzz where id = ?', [$id]);   
    return view('employeeEdit',['data'=> $data]);
}
public function paginate(){
    $users = DB::table('zzz')->paginate(2);
 
        return view('paginate', ['users' => $users]);
}
public function getPaginateView(){
    $users = DB::table('zzz')->paginate(4);
 
        return view('paginateView', ['users' => $users]);
}

public function getPayroll(){
    return view('payroll');
}

public function viewProfile($email){
    $users = DB::select('select * from zzz where email = ?',[$email]);
    return view('viewOwnProfile',['users'=>$users]); 
}
public function updateOwnProfile($id){
    $users = DB::select('select * from zzz where id = ?',[$id]);
    return view('updateOwnProfile',['users'=>$users]);
}
public function postupdateOwnProfile(Request $request,$id){
    $email = $request->input('email');
$password = $request->input('psw');
$team = $request->input('team');
$designation = $request->input('designation');

DB::update('update zzz set email=?, password = ?,team=?,designation=? where id = ?',[$email,$password,$team,$designation,$id]);
echo "Record updated successfully.";
}
}


