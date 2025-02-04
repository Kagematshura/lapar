<?php

namespace App\Http\Controllers;
use App\Models\Recipe;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(){
        $recipe = Recipe::all();
        return view("main.main_page", compact('recipe'));
    }
    public function recipePreview(){
        return view("main.preview");
    }
}
