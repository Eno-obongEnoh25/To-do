<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Models\Newlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SignupController extends Controller
{
    // Return views: Usersignup and Userlogin
    public function show()
    {
        return view('Usersignup');
    }

    public function enter()
    {
        return view('Userlogin');
    }


    // Create User
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' =>'required|unique:users,email|max:255',
            'password' => 'required|confirmed'
        ]);
        $signup = new User();

        $signup->name = $request->input('name');
        $signup->email = $request->input('email');
        $signup->password = Hash::make($request->input('password'));
        $signup->save();


        $credentials = collect($request)->only('email', 'password');

        Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ]);

        if(!auth()->user()){
        return redirect()->route('Usersignup');
        }

        return redirect()->route('list');

    }

    // Login User
   public function login(Request $data) {

        $credentials = collect($data)->only('email', 'password');

        Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ]);

        $data->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->user()) {
            return redirect()->route('list');
        }
        return redirect()->route('Userlogin')->with('invalid', 'Invalid email and/or password inputs');
   }


   // User logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }



}
