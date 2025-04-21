<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'location',
        'image',
        'status',
        'organisateur_id',
        'category_id',
        'prix',
        'max_participants',
    ];



    public function categorie()
    {
        return $this->belongsTo(Categorie::class ,'category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function codePromos()
    {
        return $this->hasOne(Codepromo::class);
    }

    public function organisateur()
    {
        return $this->belongsTo(Organisateur::class);
    }
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'reservations');
    }
}
