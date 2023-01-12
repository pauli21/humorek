<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Image extends Model
{
    //zaktualizowanie w bazie tylko tych pól
    protected $fillable = ["name", "file", "user_id"];

    //zliczenie głosów
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    //zwróci zalogowanego użytkownika
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //zliczenie łapki w górę
    public function getVotesUp()
    {
        return $this->votes->where('votes', 1)->count();
    }

    //zliczenie łapki w dół
    public function getVotesDown()
    {
        return $this->votes->where('votes', -1)->count();
    }
}
