<?php

namespace App\Services;
use Illuminate\Http\Request;

use App\Models\Serie;


class CriadorDeSerie
{
    public function criarSerie(String $nomeSerie,int $qtdTemporadas,int $epPorTemporada):Serie
    {
        $serie = Serie::create(['nome'=>$nomeSerie]);
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $epPorTemporada; $j++) {
                $temporada->episodio()->create(['numero'=> $j]);
            }

        }

        return $serie;

    }

}