<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable=[
        'date_naissance',
        'adresse',
        'genre',
        'user_id'
    ];

    // public function events(){
    //     return $this->belongsToMany(Event::class, 'reservations')
    //     ->withPivot('nom', 'prenom', 'email', 'tel', 'prix_total', 'code_id');
    // }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }



}
