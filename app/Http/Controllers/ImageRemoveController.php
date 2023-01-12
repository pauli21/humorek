<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\File;

class ImageRemoveController extends Controller
{
    //usuwanie obrazka oraz rekordu w bazie danych
    public function removeImage(Request $request){

            $validated = $request->validate([
            'image' => ['required', 'exists:images,id'],
            ]);
            //znalezienie obrazka
            $image=Image::find($validated['image']);

            //ścieżka do pliku
            $image_path = $image->file;

            //usuwanie obrazka jako pliku
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            //rekord w bazie danych
            Image::destroy($image->id);
            return redirect('/')->with('success', "Removed successfully.");
    }
}
