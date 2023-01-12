<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    //zwrócenie boksów z obrazkami jako listy 10 obrazków na stronie
    public function index()
    {
       $images = Image::paginate(10);
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
