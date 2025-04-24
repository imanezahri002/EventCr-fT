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

    public function events(){
        return $this->belongsToMany(Event::class, 'reservations');
    }
    public function users(){
        return $this->belongsTo(User::class);
    }


}
