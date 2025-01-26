<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(){
        return view("main.main_page");
    }
    public function recipePreview(){
        return view("main.preview");
    }
}
