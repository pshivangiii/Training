<?php

namespace App\Http\Controllers;

use App\Info;
use App\Adminreg;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
// use App\Http\Controllers\Validator;
use App\Http\Controllers\Controller;

class RegController extends Controller
{
     /**
     * 
     *
     * @param  Request  $request
     * @return Response
     */
   public function index(){
        return view('reg');
    }
  
  
   public function postreg(Request $request)
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

    $info->team=$request->input('team');

    $info->designation=$request->input('designation');
    $info->save();   
    return view('login');
}
public function admin(){
    return view('adminreg');
}


public function adminpost(Request $request)
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

$info=new Adminreg;

$info->email=$request->input('email');

$info->password=$request->input('psw');

// $info->team=$request->input('team');

// $info->designation=$request->input('designation');
$info->save();   
return view('adminlogin');
}
}
