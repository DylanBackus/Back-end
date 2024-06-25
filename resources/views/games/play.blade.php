<!-- resources/views/games/play.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Speel het woordspel</h1>
    <p>Spel ID: {{ $game->id }}</p>
    <p>Status: {{ $game->status }}</p>

    <!-- Voeg hier de game logica en interface toe, zoals bijv. Wordle -->
    <div id="wordgame">
        <form id="wordgame-form">
            <input type="text" id="guess" placeholder="Raad een woord" maxlength="5">
            <button type="submit">Submit</button>
        </form>
        <div id="feedback"></div>
    </div>

    <script>
        document.getElementById('wordgame-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const guess = document.getElementById('guess').value;
            // Simpele feedback logica
            if (guess === 'apple') {
                document.getElementById('feedback').textContent = 'Correct!';
            } else {
                document.getElementById('feedback').textContent = 'Probeer opnieuw!';
            }
        });
    </script>
@endsection
