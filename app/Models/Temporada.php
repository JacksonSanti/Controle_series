<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    public function Episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function Serie()
    {
        return $this->belongsTo(Serie::class);
    }


}
