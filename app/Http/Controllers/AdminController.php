<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminRecipe(){
        $recipes = Recipe::all();
        return view("admin.datarecipe", compact('recipes'));
    }
    public function AdminImage(){
        return view("admin.dataimage");
    }
    public function AdminUser(){
        $users = User::all();
        return view("admin.datauser", compact('users'));
    }

    public function AdminHomePage(){
        return view("admin.home");
    }

    public function AdminLogin(){
        return view("admin.adminlogin");
    }

    public function login(Request $request)
    {
        Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password]);
        return redirect()->route('admin.home');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.adminlogin');
    }
}
