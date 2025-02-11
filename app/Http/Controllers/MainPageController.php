<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\CaroImage;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(){
        $recipe = Recipe::all();
        $caroimage = CaroImage::all();
        return view("main.main_page", compact('recipe', 'caroimage'));
    }
    public function recipePreview(){
        return view("main.preview");
    }
}
