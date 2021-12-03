@extends('layout')

@section('cabecalho')
    LISTA DE SERIES
@endsection
    


@section('conteudo')

    @if(!empty($mensagem))
    <div class="alert alert-success">
    {{$mensagem}}
    </div>
    {{header('Refresh:1')}}
    @endif
    

    <a href=/series/criar class="btn btn-primary mb-2">ADCIONAR</a>
    
    

    <ul class="list-group">
    @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center"> {{$serie->nome}} 
        <form method="POST" action="/series/remover/{{$serie->id}}">
            @csrf
            <button class="btn btn-danger btn-sm" ><i class="fas fa-trash-alt"></i></button>
        </form>
        </li>
    @endforeach
    </ul>
@endsection
