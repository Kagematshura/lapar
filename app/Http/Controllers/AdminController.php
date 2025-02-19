<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;

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
}
