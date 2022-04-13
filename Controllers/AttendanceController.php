<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use App\EmployeeDetails;
use App\AttendanceRecord;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function getAttendance()
     {
        return view('attendancePortal');
     }

    public function getView(Request $request,$email)
     {
      $value = $request->session()->get('email');
      if(empty($value))
      { 
          return view('newLogin');
      }
        $users=EmployeeDetails::specificDataa($email);
        return view('calendar',['users'=>$users]);
     }
    public function getAtt($id)
     {
        $users=EmployeeDetails::dataById($id);
        return view('newfinal',['users'=>$users]);
     }
    public function finalSubmit(Request $request,$id) 
     {
      $value = $request->session()->get('email');
      if(empty($value))
      { 
          return view('newLogin');
      }
        $email = $request->input('email');
        $password = $request->input('psw');
        $team = $request->input('team');
        $attendance = $request->input('attendance');
        EmployeeDetails::updateData($id,$email,$password,$team,$attendance);
        echo "Attendance updated successfully.";
     }


    public function getApprovals()
     {
        $users=EmployeeDetails::approval();
        return view('approveRequest',['users'=>$users]);
     }

    public function finalApprove(Request $request,$email) 
     {
      $value = $request->session()->get('email');
      if(empty($value))
      { 
          return view('newAdminLogin');
      }
      $users=EmployeeDetails::specificDataa($email);
        return view('approveAttendance',['users'=>$users]);        
     }
     public function postApproveAttendance(Request $request,$email)
     {
        $email = $request->input('email');
        $password = $request->input('psw');
        $team = $request->input('team');
        $designation = $request->input('designation');
        $attendance = $request->input('attendance');
        $approved = $request->input('approved');
        EmployeeDetails::updateAttendance($email,$attendance,$approved);
        echo "Record updated successfully.";
     }
}
