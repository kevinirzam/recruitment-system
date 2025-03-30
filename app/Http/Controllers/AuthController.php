<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('signin');
    }
    public function signInHandler(Request $req)
    {
        if (!Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return response()->json([
                'success' => false,
                'message' => 'Login failed, please check your email and password!'
            ]);
        } else {
            $user = Auth::user();
            return response()->json([
                'success' => true,
                'message' => 'Login successfully',
                'user' => $user,
                'redirect' => 'administrator'
            ]);
        }
    }
    public function signUp()
    {
        return view('signup');
    }
    public function signUpHandler(Request $req)
    {
        User::create([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'address' => $req->address,
            'phone_number' => $req->phone_number,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'id_role' => $req->role
        ]);
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        session()->flash('message', 'You have been logged out!');
        return redirect('');
    }
}
