<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
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

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada);
        
        
        $request->session()
        ->flash(
            'mensagem',
            "A série {$serie->nome} e suas temporadas e episodios criados com sucesso, sua id é {$serie->id}"
        );

        return redirect ('/series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {

        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        $request->session()
        ->flash(
            'mensagem',
            "A série {$nomeSerie} foi removida com sucesso"
        );

        return redirect ('/series');
    }

    public function editaNome ($id, Request $request)
    {   
        $novoNome = $request -> nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
