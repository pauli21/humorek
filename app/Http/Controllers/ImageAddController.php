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
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'file' => ['required','file'],
            ]);


            //przekazanie ścieżki do folderu public w którym zapisują się te obrazki
            $path = $request->file('file')->store('','public');

            //utwoerzenie zmiennej $image do przekazania tworzenia nowego zdjęcia w bazie danych 
            $image = new Image([
               "name" => $request->get('name'),
               "file" => $path,
               "user_id" => auth()->user()->id,
            ]);

            $image->save();




    //jeżeli obrazek się dodał przkieruje na stronę z tym obrazkiem
        return redirect('/image/show/'.$image->id)->with('success', "Upload successfully.");
    }
	


    
//przekazanie do widoku formularza -> skierowanie do pliku add.blade.php w katalogu image

    public function showAddImageForm()
    {
        return view ("image.add");
    }

}
