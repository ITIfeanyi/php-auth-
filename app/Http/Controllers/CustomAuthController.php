<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    //
    public function login () {
        return view('auth.login');
    }
    public function registration () {
        return view('auth.registration');
        
    }
    public function registerUser(Request $request)
    {
        # code...
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|max:10|min:4',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
       $res = $user->save();

       if($res){
           return back()->with('success', 'You have registered successfully');
       }else {
           return back()->with('fail', 'Something went wrong');
       }

    }

    public function loginUser(Request $request)
    {
        # code...
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if(!$user){
            return back()->with('fail', 'This email is not registered');
        }
        
        if(!Hash::check($request->password, $user->password)){
            return back()->with('fail', 'Password incorrect');
        }

        $request->session()->put('loginId', $user->id);
       return redirect('dashboard');
        
    }

    public function dashboard()
    {
        # code...
        $data = User::where('email', '=', Session::get('loginId'))->first();
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }

    public function logout()
    {
        # code...
        if(Session::has('loginId')){
           Session::pull('loginId');

           return redirect('login');
        }
    }
    
}
