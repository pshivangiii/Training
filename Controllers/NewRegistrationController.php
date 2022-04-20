<?php

namespace App\Http\Controllers;
use App\EmployeeDetails;
use App\AdminDetails;
use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;

class NewRegistrationController extends Controller
{
    public function getReg()
    {
        try
        {
            return view('newreg');
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }
    public function reg(RegisterRequest $request)
    {
        try
        {
            $request->validate();
 
            $email=$request->input('email');

            $password=$request->input('psw');
    
            $team=$request->input('team');
    
            $designation=$request->input('designation');

            EmployeeDetails::registrationModel($email,$password,$team,$designation);

            return view('newlogin');
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    } 
    public function getAdminReg()
    {
        try
        {
            return view('newAdminReg');
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }
    public function postAdminReg(RegisterRequest $request)
    {
        try
        {
            $request->validate();
            $email=$request->input('email');

            $password=$request->input('psw');
            AdminDetails::adminregistrationModel($email,$password);
            return view('newAdminLogin');
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
    }
}