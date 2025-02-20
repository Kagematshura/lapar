<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\CaroImage;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(Request $request)
{
    $recipe = Recipe::paginate(4);
    $caroimage = CaroImage::all();
    $recentUploads = Recipe::where('user_id', auth()->id())->latest()->paginate(4);

    // if ($request->ajax() && $request->query('type') === 'recent') {
    //     return view('partials.recent_uploads', compact('recentUploads'))->render();
    // }
    
    // if ($request->ajax() && $request->query('type') === 'recommendations') {
    //     return view('partials.main_uploads', compact('recipe'))->render();
    // }
        return view("main.main_page", compact('recipe', 'caroimage', 'recentUploads'));
}

    public function recipePreview(){
        return view("main.preview");
    }

    public function loadMoreMain(Request $request)
{
    $page = $request->get('recommendation_page', 1);
    $recipe = Recipe::paginate(4, ['*'], 'page', $page);
    return view('partials.main_uploads', compact('recipe'))->render();
}

    public function loadMoreRec(Request $request)
{
    $recentUploads = Recipe::where('user_id', auth()->id())->latest()->paginate(4);
    return view('partials.recent_uploads', compact('recentUploads'))->render();
}

}
