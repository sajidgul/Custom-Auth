<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Auth;
use App\Models\Admin;
use Hash;
use Session;

class AuthController extends Controller
{
    function LoginView(){
        return view('auth/login');
    }
    function RegisterView(){
        return view('auth/register');
    }
    function RegisterAdmin(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:5'
        ]);


    Admin::create([
        'name'=> $request->name,
        'email'=>$request->email,
        'password'=>\Hash::make($request->password)
    ]);
    
    auth()->attempt($request->only('email', 'password'));
    return view('dashboard');

    // start
    // $admin = new Admin();
    // $admin->name = $request->name;
    // $admin->email = $request->email;
    // $admin->password = Hash::make($request->password);
    // $result = $admin->save();
    // if($result){
    //     return back()->with('success', 'you have been registered successfully');
    // }else{
    //     return back()->with('fail', 'Something Went Wrong');
    // }
    // end

    }
    

    function LoginAdmin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);

        // $admin = Admin::where('email', '=', $request->email)->first();
        // if(!$admin){
        //     return back()->with('fail', 'we do not recognize your email address');
        // }else{
        //     if(Hash::check($request->password, $admin->password)){
        //         $request->session()->put('loginId', $admin->id);
        //         return redirect()->route('dash');

        //     }else{
        //         return back()->with('fail', 'Incorrect Password');
        //     }
        // }
        auth()->attempt($request->only('email', 'password'));
        return redirect()->route('dash');
    }

}