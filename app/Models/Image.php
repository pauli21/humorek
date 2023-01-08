<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
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
