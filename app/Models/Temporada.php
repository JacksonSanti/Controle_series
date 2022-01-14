<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{

    protected $fillable = ['numero'];
    public $timestamps = false;
    use HasFactory;
    
    public function episodio ()
    {
        return $this->hasMany(episodio::class);
    }

    public function serie ()
    {
        return $this->belongTo(Serie::class);
    }

    public function getEpisodiosAssistidos(): Collection
    {
        return $this->episodio->filter(function(Episodio $episodio)
        {
            return $episodio->assistido;
        });

    }
}
