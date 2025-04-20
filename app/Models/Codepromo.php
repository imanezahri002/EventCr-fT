<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codepromo extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'remise',
        'nbUtilisation',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
