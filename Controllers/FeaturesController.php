<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;

use Session;

use Illuminate\Validation\Rule;

// use App\Http\Controllers\Validator;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{ 
    public function addUser()
    {
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

    $email=$request->input('email');
    $password=$request->input('psw');
    $team=$request->input('team');
    $designation=$request->input('designation');
    EmployeeDetails::registrationModel($email,$password,$team,$designation); 
    return "NEW EMPLOYEE ADDED";
    }

    public function destroy($id)
    {
        EmployeeDetails::deleteData($id);
        return "DELETED SUCCESSFULLY";
    
    }
    public function showData()
    {
        $data=EmployeeDetails::AllData();
        return view('userDetails',['data'=> $data]);
    }
    public function getPaginateView()
    {
         $users=EmployeeDetails::AllDatap();
        return view('paginateView',['users'=> $users]);
    }

    public function getPayroll()
    {
        return view('payroll');
    }

    public function viewProfile($email)
    {
        $users=EmployeeDetails::specificDataa($email);
        return view('viewOwnProfile',['users'=>$users]); 
    }
    public function updateOwnProfile($email)
    {
         $users=EmployeeDetails::specificData($email);
         return view('updateOwnProfile',['users'=>$users]);
    }
    public function postupdateOwnProfile(Request $request,$id)
    {
        $email = $request->input('email');
        $password = $request->input('psw');
        $team = $request->input('team');
        $designation = $request->input('designation');
        EmployeeDetails::updateProfile($id,$email,$password,$team,$designation);

        echo "Profile updated successfully.";
    }
}


