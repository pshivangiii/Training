<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    public function index(){
        $users = DB::select('select * from zzz');
        return view('payroll',['users'=>$users]);
        }
        public function postPayroll(Request $request){
            $email=$request->input('uname');
            $users = DB::select('select email,team, designation from zzz where email = ?',[$email]);
            return view('payrollDetails',['users'=>$users]);
    
        }
    public function getDetails($email){
        $users = DB::select('select email,team, designation from zzz where email = ?',[$email]);
        return view('payrollDetails',['users'=>$users]);
        // return view('payrollDetails');
     
    }
    // public function postPayrollDetails(Request $request,$id){
    //     $email=$request->input('uname');
    //     $users = DB::select('select team, designation from zzz where email = ?',[$email]);
        

    // }
}
