<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Image extends Model
{
    protected $fillable = ["name", "file", "user_id"];

    /*dla Laravela to jest informacja że będzie się łączył między tabelą image i votes */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
