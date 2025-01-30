<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminRecipe(){
        return view("admin.datarecipe");
    }
    public function AdminImage(){
        return view("admin.dataimage");
    }
}
