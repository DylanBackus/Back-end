<!-- resources/views/games/play.blade.php -->
@extends('layouts.app')

@section('content')
    <style>
        .correct { background-color: green; color: white; }
        .misplaced { background-color: yellow; color: black; }
        .wrong { background-color: red; color: white; }
    </style>

    <h1>Speel het woordspel</h1>
    <p>Spel ID: {{ $game->id }}</p>
    <p>Status: {{ $game->status }}</p>

    <div id="wordgame">
        <p>Het woord heeft {{ strlen($word->word) }} letters.</p>
        <form id="wordgame-form">
            <input type="text" id="guess" placeholder="Raad een woord" maxlength="{{ strlen($word->word) }}">
            <button type="submit">Submit</button>
        </form>
        <div id="feedback"></div>
    </div>

    <script>
        const word = @json($word->word);
        
        document.getElementById('wordgame-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const guess = document.getElementById('guess').value;
            const feedback = document.getElementById('feedback');
            feedback.innerHTML = '';  // Clear previous feedback

            if (guess.length !== word.length) {
                feedback.textContent = 'Je gok moet ' + word.length + ' letters hebben.';
                return;
            }

            let feedbackHtml = '';
            for (let i = 0; i < guess.length; i++) {
                if (guess[i] === word[i]) {
                    feedbackHtml += `<span class="correct">${guess[i]}</span>`;
                } else if (word.includes(guess[i])) {
                    feedbackHtml += `<span class="misplaced">${guess[i]}</span>`;
                } else {
                    feedbackHtml += `<span class="wrong">${guess[i]}</span>`;
                }
            }
            feedback.innerHTML = feedbackHtml;

            if (guess === word) {
                feedback.innerHTML += ' Correct!';
            } else {
                feedback.innerHTML += ' Probeer opnieuw!';
            }
        });
    </script>
@endsection
