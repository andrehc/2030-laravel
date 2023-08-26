<x-layout title="Séries">
    <a href="{{ route('series.index') }}" class="btn btn-dark mb-2">Home</a>
    {{ dd($series) }}
    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item">
            {{ $serie->nome }}
            {{ $serie->deleted_at }}
        </li>
        @endforeach
    </ul>
</x-layout>
