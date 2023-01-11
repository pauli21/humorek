<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;


// kontoler dodawania obrazka
//creadentials to pola z bazy danych z walidacjami pól

class ImageAddController extends Controller
{
    public function addImage(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:15'],
            'file' => ['required','file'],
            ]);


        //if ($request->hasFile('file')) {

            $path = $request->file('file')->store('','public');

            $image = new Image([
               "name" => $request->get('name'),
               "file" => $path,
               "user_id" => auth()->user()->id,
            ]);

            $image->save();


         //}

        return redirect('/image/show/'.$image->id)->with('success', "Upload successfully.");
    }


    
//przekazanie do widoku formularza -> skierowanie do pliku add.blade.php w katalogu image

    public function showAddImageForm()
    {
        return view ("image.add");
    }

}
