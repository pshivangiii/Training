<?php
namespace App\Http\Controllers;


use App\Info;
use App\Adminreg;
use Illuminate\Support\Facades\DB;

use Session;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function filter(){
        $users = DB::select('select * from zzz');
        return view('filter',['users'=>$users]);
    }
    public function postFilter(Request $request){
        $search=$request->input('search');
        $text=$request->input('text');
        // return view('filterview',['users'=>$text]);
        if($text == 'aaa'){
            echo "We are here";
        }
        // if($search == 'Name'){
        //     $users = DB::select('select id from zzz where email = ?', [$text]);
        //     return view('filterview',['users'=>$users]);
        // }
        // else{
        //     echo "NO RECORD FOUND";
        // }

        // if($search == 'Designation'){
        //     $users = DB::select('select * from zzz where designation = ?', [$text]);
        //     return view('filterview',['users'=>$users]);
        // }
        // else{
        //     echo "NO RECORD FOUND";
        // }
    }
    public function filterview($email){
        $users = DB::select('select * from zzz where email = ?', [$email]);
        // return view('filterview',['users'=>$users]);
    }
    public function postFilterview(Request $request,$email){
        $search=$request->input('search');
        $text=$request->input('text');
        if($search == 'Name'){
            $users = DB::select('select * from zzz where email = ?', [$email]);
            return view('filterview',['users'=>$users]);
        }
        else{
            echo "NO RECORD FOUND";
        }
    }



    public function getSearch(){
        $users = DB::select('select * from zzz');
        return view('search',['users'=>$users]);
    }
}
