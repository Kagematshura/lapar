<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\CaroImage;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(Request $request)
{
    $recipe = Recipe::all();
    $caroimage = CaroImage::all();
    $recentUploads = Recipe::where('user_id', auth()->id())->latest()->paginate(4);

    if ($request->ajax()) {
        return view('partials.recent_uploads', compact('recentUploads'))->render();
    }
        return view("main.main_page", compact('recipe', 'caroimage', 'recentUploads'));
}

    public function recipePreview(){
        return view("main.preview");
    }
}
