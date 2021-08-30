<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
    public function toRegist()
    {
        return view('register');
    }
    public function registInfo(RegisterPostRequest $request)
    {
        $valid = $request->validate();
        //([
//            'name' =>'required',
//            'email'=>'required|min:4|max:100',
//            'password'=> 'required|min:8|max:30',
 //       ]);
         $name = $request->input('name');
         $password = $request->input('password');
         $email = $request->input('email');

        //$password = Hash::make('password');

       // dd($email);
         $person = new Person();
         $person->name = $name;
         $person->password = $password;
         $person->email = $email;
         $person->save();

         return redirect()->route('login');
    }
    public function toLogin()
    {
        return view('login');
    }
    public function loginInfo(Request $request)
    {
        $credentials = $request->only('name', 'password');

        //dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            echo 'jes';
           // return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
