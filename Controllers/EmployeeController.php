<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{

//EDIT EMPLOYEE DETAILS
    public function index()
    {
        $users=EmployeeDetails::allData();
        return view('updateEmp',['users'=>$users]);
    }

    public function show(Request $request,$email) 
    {
        $value = $request->session()->get('email');
        if(empty($value))
        { 
            return view('newAdminLogin');
        }
        $users=EmployeeDetails::specificData($email);
        return view('update',['users'=>$users]);
    }

    public function edit(Request $request,$id)
    {
        
        $email = $request->input('email');
        $password = $request->input('psw');
        $team = $request->input('team');
        $designation = $request->input('designation');
        EmployeeDetails::updateProfile($id,$email,$password,$team,$designation);
        echo "Record updated successfully.";
    }
    //VIEW TEAM'S DATA IF YOU'RE A MANAGER
    public function myTeam(Request $request,$team)
    {
        $value = $request->session()->get('email');
      if(empty($value))
      { 
          return view('newLogin');
      }
        $users=EmployeeDetails::viewTeam($team);
        return view('myteam',['users'=>$users]); 
    }

}


