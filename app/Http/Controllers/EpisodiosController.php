<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {   
        $episodios = $temporada-> episodio;
        $temporadaId = $temporada->id;
        $mensagem = $request->session()->get('mensagem');


        return view('episodios.index', compact('episodios','temporadaId', 'mensagem'));
    }

    public function assistir (Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;
        $temporada->episodio->each(function(Episodio $episodio) use ($episodiosAssistidos){
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });


       
        $temporada->push();
        $request->session()->flash('mensagem', 'Episodios assistidos');

        return redirect()->back( );
    }
}



