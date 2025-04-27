<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'event_id',
        'code_id',
        'prix_total',
        'nom',
        'prenom',
        'email',
        'tel',
    ];

    // public function codePromos()
    // {
    //     return $this->belongsTo(Codepromo::class);
    // }

    public function codepromos()
    {
        return $this->belongsTo(Codepromo::class, 'code_id');
    }
}
