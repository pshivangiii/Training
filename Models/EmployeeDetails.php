<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetails extends Model
{
    protected $table="employee_details";
    protected $primaryKey="id";

    public static function registrationModel($email,$password,$team,$designation)
    {
       $reg=new EmployeeDetails();
       $reg->email=$email;
       $reg->password=$password;
       $reg->team=$team;
       $reg->designation=$designation;
       $reg->save();
    }

    public static function login($email,$password,$request)
    {
         $check=EmployeeDetails::where(['email'=>$email,'password'=>$password])->get();
        
         if(count($check)>0)
        
                {
                    $users=EmployeeDetails::where(['email'=>$email,'password'=>$password])->get();
                    $request->session()->put('email',$email);
                    $users=compact('users');
                    return $users;
                }
    }
    public static function getLogin($email,$request)
    {
         $check=EmployeeDetails::where(['email'=>$email])->get();
        
         if(count($check)>0)
        
                {
                    $users=EmployeeDetails::where(['email'=>$email])->get();
                    $users=compact('users');
                    return $users;
                }
    }

    public static function find($email,$password)
    {
         $users=EmployeeDetails::where(['email'=>$email,'password'=>$password])->get();
          if(!empty($users))
            {
              return $email;
            }
    }

    public static function allDatap()
    {
        $users=EmployeeDetails::paginate(3);
        return $users;
    }

    public static function allData()
    {
        $users=EmployeeDetails::all();
        return $users;
    }
        
    public static function updateData($id,$email,$password,$team,$attendance)
    {
         EmployeeDetails::where('email', $email)->update(['pending_requests' => $attendance]);
           
    }

    public static function specificDataa($email)
    {
        $data = EmployeeDetails::where('email', $email)->get();
        return $data;
    }
    public static function specificData($email)
    {
        $data = EmployeeDetails::where('email', $email)->first();
        return $data;
    }

    public static function dataById($id)
    {
        $data = EmployeeDetails::where('id', $id)->get();
         return $data;
    }
       
    public static function updateProfile($id,$email,$password,$team,$designation)
    {
        EmployeeDetails::where('email', $email)->update(['designation' => $designation]);
        EmployeeDetails::where('email', $email)->update(['team' => $team]);
        EmployeeDetails::where('email', $email)->update(['password' => $password]);
    }

    public static function approval()
    {
        $data=EmployeeDetails::all()->where('pending_requests','>','0');
        return $data;
    }

    public static function updateAttendance($email,$attendance,$approved)
    {
        EmployeeDetails::where('email', $email)->update(['approved_requests' => $approved]);
        EmployeeDetails::where('email', $email)->update(['pending_requests' => $attendance]);
    }

    public static function deleteData($id)
    {
        $data = EmployeeDetails::where('id', $id)->delete();
         return $data;
    }

    public static function viewTeam($team)
    {
        $data=EmployeeDetails::where(['team'=>$team])->get();
        return $data;
    }
}

