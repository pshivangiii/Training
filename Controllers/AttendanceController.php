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
        $users=EmployeeDetails::specificDataa($email);
        return view('calendar',['users'=>$users]);
     }

    public function getAtt($id)
     {
        try
        {
            $users=EmployeeDetails::dataById($id);
            return view('newfinal',['users'=>$users]);
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
     }

    public function finalSubmit(Request $request,$id) 
     {
        try
        {
            $email = $request->input('email');
            $password = $request->input('psw');
            $team = $request->input('team');
            $attendance = $request->input('attendance');
            EmployeeDetails::updateData($id,$email,$password,$team,$attendance);
            echo "Attendance updated successfully.";
        }
        catch (\Exception $e) 
        {
            return redirect('error')->with
            (
               'error', $e->getMessage()
            );
        }
     }

    public function getApprovals()
     {
        $users=EmployeeDetails::approval();
        return view('approveRequest',['users'=>$users]);
     }

    public function finalApprove(Request $request,$email) 
     {
      $users=EmployeeDetails::specificDataa($email);
        return view('approveAttendance',['users'=>$users]);        
     }

     public function postApproveAttendance(Request $request,$email)
     {
        try
        {
            $email = $request->input('email');
            $password = $request->input('psw');
            $team = $request->input('team');
            $designation = $request->input('designation');
            $attendance = $request->input('attendance');
            $approved = $request->input('approved');
            EmployeeDetails::updateAttendance($email,$attendance,$approved);
            echo "Attendance updated successfully.";
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
