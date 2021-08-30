<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function toRegist()
    {
        return view('register');
    }
    public function registInfo(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        $email = $request->input('email');

        //$password = Hash::make('password');

        // dd($email);
        $person = new User();
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

//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records.',
//        ]);
    }
}
