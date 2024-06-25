<!-- resources/views/games/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Beschikbare spellen</h1>
    <form action="{{ route('games.create') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Nieuw spel aanmaken</button>
    </form>
    <ul>
        @foreach($games as $game)
            <li>
                Spel ID: {{ $game->id }} | Status: {{ $game->status }}
                @if ($game->status == 'waiting')
                    <form action="{{ route('games.join', $game->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Join</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@endsection

