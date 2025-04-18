<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;



    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function tags()
    {
    return $this->belongsToMany(Tag::class);
    }
}
