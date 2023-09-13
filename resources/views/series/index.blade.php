<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    <a href="{{ route('series.seriesApagadas') }}" class="btn btn-danger mb-2">Series Removidas</a>

    @isset($mensagemSucesso)
        <div class="alert alert-success" id="alert">
            {{ $mensagemSucesso }}
        </div>
        <script>
            setTimeout(() => {
                document.getElementById("alert").style.display = "none";
            }, 3000);
        </script>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="col-10 list-group-item d-flex justify-content-between align-items-center">{{ $serie->nome }}
            <div class="col-2 btn-group buttons justify-content-end">
                <form action="{{ route('series.show', $serie->id) }}" method="get">
                    <button class="btn btn-secondary btn-sm margin-right-2px">Editar</button>
                </form>
                <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Apagar</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</x-layout>
