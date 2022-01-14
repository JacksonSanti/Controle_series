<?php 

namespace App\Services;

use App\Models\{Serie,Temporada,Episodio, Episodios};
use Illuminate\Support\Facades\DB;


class RemovedorDeSerie 
{
    public function removerSerie(int $serieId):string
    {

        $nomeSerie = '';
        DB::transaction(function() use ($serieId, &$nomeSerie) {

            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
            $this->removerTemporada($serie);

        });

        return $nomeSerie;
        
    }

    private function removerTemporada($serie):void
    {
        $serie->temporadas->each(function(Temporada $temporada){    
           $this->removerEpsodio($temporada);        
        });
        $serie->delete();

    }

    private function removerEpsodio(Temporada $temporada):void
    {
        $temporada->episodio->each(function(Episodio $episodio){
            $episodio->delete();
        });
            $temporada->delete();
    }




}
