<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Session;


use Illuminate\Http\Request;

class CustAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    
    public function registration(){
        return view('auth.registration');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'

        ]);

        $user=new User();
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->password=Hash::make($request->password) ;

        $res=$user->save();

        if($res){
            return back()->with('success','Successfully Registered');
        }
        else{
            return back()->with('fail','Something wrong happened,try again ');
        }
    }

    public function userLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'

        ]);
        //check if email exist
        $user=User::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                //create session
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }else {
                return  back()->with('fail',' Password incorrect');
            }
            
        }else {
                return  back()->with('fail',' email not registered');
        }


    }
    public function dashboard(){

        $details=array();

        if (Session::has('loginId')) {
            $details=User::where('id','=', Session::get('loginId'))->first();
        }
        return view('dashboard',compact('details'));
    }

    public function logout(){
        //if user is logged in
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
            
        }
    }
}



