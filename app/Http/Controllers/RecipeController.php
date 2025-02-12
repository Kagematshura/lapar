<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $recipe = Recipe::all();
        return view('recipe.main', compact('recipe'));
    }
    public function create()
    {
        return view('resep.form_resep');
    }
    public function store(Request $request)
    {
        $request->validate([
            'recipe_name' => 'required|max:255',
            'description' => 'required|max:255',
            'ingredient' => 'required|string',
            'instruction' => 'required|string',
            'total_kcal' => 'required|numeric',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $recipe = new Recipe;
        $recipe->recipe_name = $request->recipe_name;
        $recipe->description = $request->description;
        $recipe->ingredient = $request->ingredient;
        $recipe->instruction = $request->instruction;
        $recipe->total_kcal = $request->total_kcal;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store( 'images', 'public');
            $recipe->image = $imagePath;
        }

        $recipe->save();

        return redirect()->route('main.main_page')->with('success', 'Recipe saved successfully!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipe.main')->with('success', 'Recipe deleted successfully.');
    }
    public function show($id)
    {
    $recipe = Recipe::find($id);

    return view('resep.show', compact('recipe'));
    }

    public function like(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $existingLike = Like::where('recipe_id', $id)
                            ->where('user_id', Auth::id())
                            ->first();

        if ($existingLike) {
            if ($existingLike->like == $request->like) {
                $existingLike->delete();
            } else {
                $existingLike->update(['like' => $request->like]);
            }
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'recipe_id' => $id,
                'like' => $request->like,
            ]);
        }

        return redirect()->back();
    }
}
