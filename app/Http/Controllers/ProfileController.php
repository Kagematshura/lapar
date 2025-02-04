<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view("pp.profile");
    }
    public function show()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Pass the user data to the view
        return view('pp.profile', compact('user'));
    }
    public function update(Request $request) 
    {
    $user = Auth::user();
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $user->name = $request->name;
    $user->save();

    return response()->json(['success' => true]);
    }
}
