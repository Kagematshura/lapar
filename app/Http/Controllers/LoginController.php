<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function view(){
        return view('login');
    }

    public function signup(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::login($user);

        return response()->json(['message' => 'Sign-up successful'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Login successful',
            ]);
        }

        return response()->json([
            'message' => 'Invalid email or password',
        ], 401);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out']);
    }

    public function loginTest(){
        return view('login_test');
    }
}
