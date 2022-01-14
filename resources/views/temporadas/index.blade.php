@extends('layout')


@section('cabecalho')
    Temporada da Serie {{$serie->nome}}
@endsection


@section('conteudo')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
        <li class = "list-group-item d-flex justify-content-between align-tems-center">
            <a href="/temporadas/{{$temporada->id}}/episodios">
                TEMPORADA {{$temporada->numero}}
            </a>
            <span class="badge badge-dark">
                {{$temporada->getEpisodiosAssistidos()->count()}}/{{$temporada->episodio->count()}}
            </span>
        </li>
        @endforeach
        
    </ul>

@endsection