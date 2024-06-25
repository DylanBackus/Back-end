@extends('layouts.app')

@section('content')
    <h1>Spel spelen</h1>
    <p>Spel ID: {{ $game->id }}</p>
    <!-- Voeg hier de spel logica toe -->
    <form action="{{ route('games.saveResult', $game->id) }}" method="POST">
        @csrf
        <input type="hidden" name="winner_id" value="{{ Auth::id() }}">
        <input type="hidden" name="loser_id" value="{{ $game->player1_id == Auth::id() ? $game->player2_id : $game->player1_id }}">
        <input type="hidden" name="result" value="gewonnen">
        <button type="submit" class="btn btn-primary">Resultaat opslaan</button>
    </form>
@endsection
