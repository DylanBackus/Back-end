@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Spel ID: {{ $game->id }}</h1>
    <p>Status: {{ $game->status }}</p>

    <!-- Voeg hier het spelmechanisme toe, bijvoorbeeld een formulier voor het invoeren van woorden -->
    <form action="{{ route('games.saveResult', ['id' => $game->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="winner_id" value="{{ Auth::id() }}">
        <input type="hidden" name="loser_id" value="{{ $game->player2_id }}">
        <input type="hidden" name="result" value="win">
        <button type="submit" class="btn btn-primary">Win Spel</button>
    </form>
</div>
@endsection