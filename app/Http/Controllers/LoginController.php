<?php

namespace App\Http\Controllers;


use App\Info;
use App\Adminreg;
use Illuminate\Support\Facades\DB;

use Session;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
// use App\Http\Controllers\Validator;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function postlogin(Request $request){
      
        $one=1;
        $zero=0;
        $info=new Info;
        

        $email=$request->input('uname');
        $password=$request->input('psw');
        
        $login = info::where(['email' => $email, 'password' => $password])->first();
        if (!empty($login)) {
            $request->session()->put(['id' => $login->id]);  
        DB::update('update zzz set is_active = ? where email = ?',[$one,$email]);
        $request->session()->put(['id' => $login->id]);
        
        // return view('employeeFeatures');
       $id= DB::select('select id from zzz where email = ?', [$email]);
        
        $users = DB::select('select * from zzz where email = ?',[$email]);
        // return view('employeeFeatures',['users'=>$users]);
        return view('viewProfile',['users'=>$users]);
      

        }
        else{
            return view('login');
        }
        $active = DB::select('select is_active from zzz where email = ?', [$email]);
        if($active == 0){
            return view('login');
        }
    }
    function logoutin(Request $request) {
        return view('logout');
    }
    function logout(Request $request) {
        $value = $request->session()->pull('id','default');
        $zero=0;
        
        DB::update('update zzz set is_active = ? where id = ?',[$zero,$value]);
        $request->session()->forget('id');
 
        $request->session()->flush();
        // $value = $request->session()->pull('id');
        
        return view('login');
        
        
    }
    public function page()
    {
        $info=new Info;
        $users = DB::table('zzz')->paginate(15);
        
        echo $users;
        // return view('portal');
    }
    // ADMIN LOGIN

    public function getAdminLogin(){
        return view('adminlogin');
    }
    public function postAdminLogin(Request $request){
      
        $info=new Adminreg;
        

        $email=$request->input('uname');
        $password=$request->input('psw');
        $users = DB::select('select * from zzz where email = ?',[$email]);
        
       
      
        $login = info::where(['email' => $email, 'password' => $password])->first();
        if (!empty($login)) {
        // return view('features');
        return view('features',['users'=>$users]);
        }
        else{
            return view('adminlogin');
        }
    }

 }


