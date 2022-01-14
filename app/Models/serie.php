<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{       

    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nome'];
    
    public function Temporadas()
    {
        return $this->hasMany(Temporada::class);
    }




}