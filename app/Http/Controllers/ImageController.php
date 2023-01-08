<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
       $images = Image::paginate(2);
        return view ('image.list', ['images' => $images]);
        
        
    }
    public function showImage(Image $image)
    {
         return view ('image.show', ['image' => $image]);
    }


    public function addImage(Image $image)
    {
         return view ('image.show');
    }

   

}
