<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;


class SeriesController extends Controller
{
    public function index(request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
        
        return view('series.index', compact('series','mensagem'));
        


    }


    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        
        $serie = Serie::create([$request-> $request -> nome]);
        $qtdTemporadas = $request->qtd_temporadas;
        for ($i = 1; $i <= $request->qtd_temporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $request->ep_por_temporada; $j++){
                $episodio = $temporada->episodio()->create(['numero' => $j]);
            };
        }
        $request->session()
        ->flash(
            'mensagem',
            "A série {$serie->nome} foi criada com sucesso, sua id é {$serie->id}"
        );

        return redirect ('/series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        
        $request->session()
        ->flash(
            'mensagem',
            "A série foi removida com sucesso"
        );

        return redirect ('/series');
    }
}
