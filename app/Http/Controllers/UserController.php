<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "username or password is not matched";
        }
        else
        {
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    function register(Request $req){
        $customMessages = [
            'name.required' => 'Please provide your name.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name cannot be longer than 50 characters.',
            
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email address cannot be longer than 50 characters.',
            
            'password.required' => 'Please provide a password.',
            'password.min' => 'The password must be at least 5 characters long.',
            'password.confirmed' => 'The confirmation password does not match.',
            
            'password_confirmation.required' => 'Please confirm your password.',
        ];

        $validatedData = $req->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|string|min:5|confirmed', // password_confirmation should match password
            'password_confirmation' => 'required', // explicitly validate password_confirmation
        ], $customMessages);

        $user = new User;
        $emailexists = User::where('email',$req->email)->exists();
        if(!$emailexists){
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect('/login')->with('success', 'Registration successful!');
        
        }else{
            return redirect()->back()->with('error', 'Email already exists. Please use a different email.')->withInput();
              
    }

    }
    //
}
