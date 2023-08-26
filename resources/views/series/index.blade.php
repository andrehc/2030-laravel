<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    <a href="{{ route('series.seriesApagadas') }}" class="btn btn-danger mb-2">Series Removidas</a>

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{ $serie->nome }}
            <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Apagar</button>
            </form>
        </li>
        @endforeach
    </ul>
</x-layout>
