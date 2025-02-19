<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view("pp.profile");
    }
    public function show()
    {
        $user = Auth::user();

        return view('pp.profile', compact('user'));
    }
    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'profile_picture' => 'nullable|string'
    ]);

    // If a new profile picture is uploaded
    if ($request->profile_picture) {
        // Decode Base64 image string
        $image = $request->profile_picture;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageData = base64_decode($image);

        // Generate unique filename
        $fileName = 'profile_' . time() . '.png';
        $filePath = 'storage/profile_pictures/' . $fileName;

        // Store image in public/storage/profile_pictures
        file_put_contents(public_path($filePath), $imageData);

        // Update user profile picture path
        $user->profile_picture = $filePath;
    }

    $user->name = $request->name;
    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Profile updated successfully',
        'profile_picture' => asset($user->profile_picture),
        'name' => $user->name
    ]);
}
}
