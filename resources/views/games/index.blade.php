@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Beschikbare Spellen</h1>
    <a href="{{ route('games.create') }}" class="btn btn-primary">Nieuw Spel Starten</a>
    <ul>
        @foreach($games as $game)
            <li>
                Spel ID: {{ $game->id }} - Status: {{ $game->status }}
                @if($game->status == 'waiting')
                    <form action="{{ route('games.join', ['id' => $game->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Deelnemen</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
