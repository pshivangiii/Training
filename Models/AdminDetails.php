<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminDetails extends Model
{
    protected $table="admin_details";
    protected $primaryKey="id";

    public static function adminregistrationModel($email,$password)
    {
        $reg=new AdminDetails();
        $reg->email=$email;
        $reg->password=$password;
        $reg->save();
    }
    public static function getLogin($email,$request)
    {
         $check=AdminDetails::where(['email'=>$email])->get();
        
         if(count($check)>0)
        
                {
                    $users=AdminDetails::where(['email'=>$email])->get();
                    $users=compact('users');
                    return $users;
                }
    }

    public static function login($email,$password,$request)
    {
        $check=AdminDetails::where(['email'=>$email,'password'=>$password])->get();
        if(count($check)>0)
        {
            $users=AdminDetails::where(['email'=>$email,'password'=>$password])->get();
            $request->session()->put('email',$email);
            $users=compact('users');
            return $users;
        }

    }
}
