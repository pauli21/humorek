<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Vote extends Model
{
    //wymagania pól do aktualizacji w bazie
    protected $fillable = ["user_id", "votes", "image_id"];
    public $timestamps = false;
    use HasFactory;

}
