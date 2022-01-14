@extends('layout')

@section('cabecalho')
    Lista de Series
@endsection
    


@section('conteudo')

    @include('mensagem', ['mensagem' => $mensagem])
    
@auth
    <a href=/series/criar class="btn btn-primary mb-2">ADCIONAR</a>
@endauth
    
    

    <ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

        <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
            <input type="text" class="form-control" value="{{ $serie->nome }}">
            <div class="input-group-append">
                <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                    <i class="fas fa-check"></i>
                </button>
                @csrf
            </div>
        </div>

    <span class="d-flex">
        @auth
        <button class="btn btn-outline-info btn-sm mr-1" onclick ="toggleInput({{ $serie->id }})">
            <i class="fas fa-edit"></i>
        </button>
        @endauth
        <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-outline-info btn-sm mr-1">
            <i class="fas fa-external-link-alt"></i>
        </a>
        @auth
        <form method="post" action="/series/remover/{{ $serie->id }}"
              onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($serie->nome) }}?')">
            @csrf
            @method('delete')
            <button class="btn btn-outline-danger btn-sm">
                <i class="far fa-trash-alt"></i>
            </button>
            </form>
        @endauth
        </span>
    </li>
    @endforeach
    </ul>

    
        <script type="text/javascript">

        function toggleInput(serieId) {
        const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
        if (nomeSerieEl.hasAttribute('hidden')) {
        nomeSerieEl.removeAttribute('hidden');
        inputSerieEl.hidden = true;
        } else {
        inputSerieEl.removeAttribute('hidden');
        nomeSerieEl.hidden = true;
        }

        }

        function editarSerie(serieId) {
            let formData = new FormData();
            const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
            const token = document.querySelector(`input[name="_token"]`).value;
            formData.append('nome',nome);
            formData.append('_token',token);


            const url = '/series/${serieId}/editaNomne';
            fetch(url, {
                body: formData,
                method: 'POST'
            }).then(() => {
            toggleInput(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;
    });

        }

        </script>
    


@endsection
