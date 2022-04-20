<?php

namespace App\Http\Controllers;
use App\EmployeeDetails;
use App\AdminDetails;
use Illuminate\Http\Request;

class NewRegistrationController extends Controller
{
    public function getReg()
    {
        return view('newreg');
    }
    public function reg(Request $request)
    {
        $this->validate(request(),[
            'email' => 'required|email',

            'password' => 'required|confirmed',
        ]);
        $email=$request->input('email');

        $password=$request->input('psw');
    
        $team=$request->input('team');
    
        $designation=$request->input('designation');

        EmployeeDetails::registrationModel($email,$password,$team,$designation);

        return view('newlogin');
    } 
    public function getAdminReg()
    {
        return view('newAdminReg');
    }
    public function postAdminReg(Request $request)
    {
        $email=$request->input('email');

        $password=$request->input('psw');
        AdminDetails::adminregistrationModel($email,$password);
        return view('newAdminLogin');
    }
}
