@extends('layout')


@section('cabecalho')
    Episodios
@endsection

@section('conteudo')

@include('mensagem', ['mensagem' => $mensagem])


<form action="/temporadas/{{$temporadaId}}/episodios/assistir" met hod="get"> 
    @csrf
    <ul class = "list group">
    @foreach($episodios as $episodio)
        <?php $epi= $episodio->assistido ?>
        
        <li class = "list-group-tem d-flex justify-content-between align-items-center">
            Episódio {{$episodio->numero}}
            <input type="checkbox" name="episodios[]" value="{{$episodio->id}}"  
           {{$epi ? 'checked' : ''}} >
        
        </li>
        
    @endforeach
    </ul>

    <button class="btn btn-primary mt-2 mb-7">Salvar</button>
</form>
@endsection