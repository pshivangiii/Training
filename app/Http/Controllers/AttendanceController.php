<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use App\AttendanceRecord;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
   
    // public function postAttendance(Request $request){
    //     $att=$request->input('att');
    //     // if (!empty($att)){
    //     //     echo "OK";
    //     return view('a');
    // }
    

    public function index($email){
        $users = DB::select('select id from zzz where email = ?',[$email]);
        return view('att',['users'=>$users]);
        }
        // public function postPayroll(Request $request){
        //     $email=$request->input('uname');
        //     $users = DB::select('select email,team, designation from zzz where email = ?',[$email]);
        //     return view('payrollDetails',['users'=>$users]);
    
        // }
    public function postIndex($id){
        $users = DB::select('select id from zzz where id = ?',[$id]);
        return view('attendancePortal',['users'=>$users]);
        

    }
    public function getAttendance(){
        return view('attendancePortal');
    }

    public function getView($email){
        $users = DB::select('select * from zzz where email = ?',[$email]);
        return view('calendar',['users'=>$users]);
        
    }
    // public function getSubmit($email){
    //     // $users = DB::select('select * from zzz where email = ?',[$email]);
    //     // return view('calendar',['users'=>$users]);
    //     return view('a');
        
    // }
    public function submit($email){
        $info=new Info;
        $present=1;
        // $present=DB::select('select attendance from zzz where email = ?',[$email]);
        // $present=$present+1;
        // DB::update('update zzz set attendance = ? where email = ?',[$present,$email]);
        $info::where('email', $email)->update(['attendance' => $present]);
        $info->save();
    }


    public function getAtt($id){
        $users = DB::select('select * from zzz where id = ?',[$id]);
        return view('final',['users'=>$users]);
    }
    public function finalSubmit(Request $request,$id) {
        $email = $request->input('email');
        $password = $request->input('psw');
        $team = $request->input('team');
        $attendance = $request->input('attendance');
        
        DB::update('update zzz set email=?, password = ?,team=?,attendance=? where id = ?',[$email,$password,$team,$attendance,$id]);
        echo "Attendance updated successfully.";
}
public function getApprovals($team){
     $users = DB::select('select * from zzz where attendance > 0 AND team = ?',[$team]);
        return view('approveRequest',['users'=>$users]);
}

public function finalApprove($email) {
    $users = DB::select('select * from zzz where email = ?',[$email]);
    return view('approveAttendance',['users'=>$users]);
        
}
public function postApproveAttendance(Request $request,$email){
   
$email = $request->input('email');
$password = $request->input('psw');
$team = $request->input('team');
$designation = $request->input('designation');
$attendance = $request->input('attendance');
$approved = $request->input('approved');

DB::update('update zzz set password=?, team=?,designation=?,attendance=?, approved=? where email = ?',[$password,$team,$designation,$attendance,$approved,$email]);
echo "Record updated successfully.";
}
public function indexa($email){
    return view('a');
}
}
