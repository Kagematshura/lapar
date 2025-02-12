<?php
namespace App\Http\Controllers;

use App\Models\CaroImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaroImageController extends Controller
{
    public function showUploadForm()
    {
        $caroimage = CaroImage::latest()->take(3)->get();
        return view('admin.dataimage', compact('caroimage'));
    }

    public function uploadCaroImage(Request $request)
    {
        $request->validate([
            'caroimage'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5150',
        ]);

        $CaroImagePath = $request->file('caroimage')->store('caroImages', 'public');

        CaroImage::create(['image_path' => $CaroImagePath]);

        return redirect()->route('admin.dataimage')->with('success', 'Image uploaded successfully.');
    }

    public function deleteCaroImage($id)
    {
        $caroimage = CaroImage::findOrFail($id);

        $currentPath = public_path('storage/' . $caroimage->image_path);
        if (file_exists($currentPath)) {
            unlink($currentPath);
        }

        $caroimage->delete();

        return redirect()->route('admin.dataimage')->with('success', 'Image deleted successfully.');
    }
}
