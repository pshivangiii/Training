<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    public function getDetails(Request $request,$email)
    {
      $value = $request->session()->get('email');
      if(empty($value))
      { 
          return view('newLogin');
      }
        $users=EmployeeDetails::specificData($email);
        return view('payrollDetails',['users'=>$users]);
    }
}
