<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showForm()
    {
        return view('backend.auth.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]); 

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $credentials = $request->only('email', 'password');

            if(Auth::attempt($credentials)) {
                $user = Auth::user();
                return redirect()->route('dashboard')->with('success', 'Welcome back, '. $user->name .'! You’ve successfully logged in.');
            }else{
                return redirect()->back()->with('error', 'You have no permission to login!');
            }
        }else{
            return redirect()->back()->with('error', 'Opps, User not found!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
