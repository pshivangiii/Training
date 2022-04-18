<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;

use Session;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{ 
    public function addUser(Request $request)
    {
      $value = $request->session()->get('email');
      if(empty($value))
      { 
          return view('newAdminlogin');
      }
        return view('addUser');
    }
    public function addUserPost(Request $request)
    {
        $value = $request->session()->get('email');
      if(empty($value))
      { 
          return view('newAdminLogin');
      }
        $this->validate($request, [
           'email' => 'required|unique:posts|max:255',
           'psw' => 'required_with:password_confirmation|same:psw-repeat',
           'psw-repeat' =>  'required|min:6'
        ]);
        
    $email=$request->input('email');
    $password=$request->input('psw');
    $team=$request->input('team');
    $designation=$request->input('designation');
    EmployeeDetails::registrationModel($email,$password,$team,$designation); 
    return "NEW EMPLOYEE ADDED";
    }

    public function destroy(Request $request,$id)
    {
        $value = $request->session()->get('email');
        if(empty($value))
        { 
            return view('newAdminLogin');
        }
        EmployeeDetails::deleteData($id);
        return "DELETED SUCCESSFULLY";
    
    }
    public function showData()
    {
        $data=EmployeeDetails::AllData();
        return view('userDetails',['data'=> $data]);
    }
    public function getPaginateView(Request $request)
    {
        $value = $request->session()->get('email');
        if(empty($value))
        { 
            return view('newAdminLogin');
        }
         $users=EmployeeDetails::AllDatap();
        return view('paginateView',['users'=> $users]);
    }

    public function getPayroll()
    {
        return view('payroll');
    }

    public function viewProfile(Request $request,$email)
    {
        $value = $request->session()->get('email');
      if(empty($value))
      { 
          return view('newLogin');
      }
        $users=EmployeeDetails::specificDataa($email);
        return view('viewOwnProfile',['users'=>$users]); 
    }
    public function updateOwnProfile(Request $request,$email)
    {
        $value = $request->session()->get('email');
      if(empty($value))
      { 
          return view('newLogin');
      }
         $users=EmployeeDetails::specificData($email);
         return view('updateOwnProfile',['users'=>$users]);
    }
    public function postupdateOwnProfile(Request $request,$id)
    {
      $value = $request->session()->get('email');
      if(empty($value))
      { 
          return view('newLogin');
      }
        $email = $request->input('email');
        $password = $request->input('psw');
        $team = $request->input('team');
        $designation = $request->input('designation');
        EmployeeDetails::updateProfile($id,$email,$password,$team,$designation);

        echo "Profile updated successfully.";
    }
}


