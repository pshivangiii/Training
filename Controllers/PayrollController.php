<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    //MVC IMPLEMENTED
    public function getDetails($email)
    {
        $users=EmployeeDetails::specificData($email);
        return view('payrollDetails',['users'=>$users]);
    }
}
