<?php

namespace App\Http\Controllers;

use App\AdminDetails;
use App\EmployeeDetails;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class NewLoginController extends Controller
{
    public function getLogin(Request $request)
    {
        $value = $request->session()->get('email');
        if(!empty($value))
        {
            
            $users=EmployeeDetails::specificData($value);
            
            return view('afterlogin')->with($users);
        
        }
        return view('newlogin');
    }
    

    public function postLogin(Request $request)
    {
        $email=$request->input('email');

        $password=$request->input('password');

        $users=EmployeeDetails::login($email,$password,$request);

        if(isset($users))
        {
          
          return view('afterlogin')->with($users);
        }
        else
        {
          return redirect('newlogin');
    }
}

    public function getAdminLogin(Request $request)
    {
        $value = $request->session()->get('email');
        if(!empty($value)){
            
            $users=EmployeeDetails::specificData($value);
            
            return view('afterlogin')->with($users);
        
        }
        return view('newAdminLogin');
    }

    public function postAdminLogin(Request $request)
    {
        $email=$request->input('email');

        $password=$request->input('password');

        $users=AdminDetails::login($email,$password);

        if(isset($users))
        {
          return view('features')->with($users);
        }
        else
        {
          return view('newAdminLogin');
        }
    }
}
    
      

