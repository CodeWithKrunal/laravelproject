<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class userController extends Controller
{
    public function register(){
        return view('Users.register');
    }

    public function registerInsert(Request $request){
        //dd($request->all());
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required','email', Rule::unique('users', 'email')],
            //'password' => 'required|confirmed|min:6'
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation'            

            ]);
            
        $formFields['password'] = bcrypt($formFields['password']);
        
        $user = User::create($formFields);
        auth()->login($user);
        return redirect('')->with('message','User Created Successfully');
    }


    public function login(){
        return view('Users.login');
    }
    
    public function loginauthentication(Request $request){
        //dd($request)->all();
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required'            
        ]);
        if(auth()->attempt($formFields)){
            
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now Logged In!');
        }
        return back()->withErrors(['email'=>'InValid Credential'])->onlyInput('email');
    }
    
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //return redirect('/homepage')->with('message','You have been Logged Out!!');
        return redirect()->route('homepage')->with('message','You have been Logged Out!!');
    }
}
