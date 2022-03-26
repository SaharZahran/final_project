<?php

namespace App\Http\Controllers\User;
// use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Redirect;

class UserController extends Controller
{
    function create(Request $request){
        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users,email',
            'password' =>'required|min:8|max:30',
            'confirm_password' =>'required|min:8|max:30|same:password'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->confirm_password = $request->confirm_password;
        $save = $user->save();
   
        if($save){
            Alert::success('Success', 'You have been registered successfully!');
            return redirect()->route('user.login');
        }else{
            return redirect()->back()->with('fail','Fail, Searching went wrong, failed to register!!');
        }
       }
   
       function check(Request $request){
           $request->validate([
               'email' =>'required|email|exists:users,email',
               'password' =>'required|min:8|max:30'
           ],[
               'email.exists' =>'This email does not exist! check it again!'
           ]);
           $cceds = $request->only('email', 'password');
           if(Auth::attempt($cceds)){
               Alert::success('Welcome Back', Auth::guard()->user()->name .' !');
            //    return redirect()->route('showLandingpage');
            return back();
           }else{
               return redirect()->route('user.login')->with('fail', 'Incorrect Credentials');
           }
       }

       function logout(){
           Auth::logout();
           return redirect('/');
       }}


