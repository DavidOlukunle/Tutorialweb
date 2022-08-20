<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    //show user form
    public function create(){
        return view('users.register');
    }


    //Create new users
    public function store(Request $request){
        $formFields=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required||confirmed||min:6'
            
        ]);
        //hash pawword
        $formFields['password']=bcrypt($formFields['password']);
        $user=User::create($formFields);

        //login
        auth()->login($user);
        return redirect('/')->with('message','User created and logged in');

    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out');
    }


    //show login form
    public function login(){
        return view('users.login');

    }

    //authenticate user
    public function authenticate(Request $request){
        $formFields=$request->validate([
            
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now logged in');
        }
        return back()->withErrors(['email'=>'invalid credentials'])->onlyInput('email');
    }
}
