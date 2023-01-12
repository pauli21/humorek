<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Vote;

class VoteController extends Controller
{
     public function addVote(Request $request)
    {
        $validated = $request->validate([
            'image' => ['required', 'exists:images,id'],
            'vote' => ['required','in:1,-1'],
            ]);


            //tworzenie nowego oddanego głosu w bazie danych, sprawdzenie zalogowanego użytkownika
            $vote = new Vote([
               "votes" => $validated['vote'],
               "user_id" => auth()->user()->id,
               "image_id" => $validated['image'],
            ]);
            //zapis w bazie
            $vote->save();


        return back();
    }

}
