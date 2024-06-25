<?php
// app/Http/Controllers/GameController.php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Word;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function create(Request $request)
    {
        Game::create([
            'player1_id' => auth()->id(),
            'status' => 'waiting',
        ]);

        return redirect()->route('games.index');
    }

    public function join($id)
    {
        $game = Game::findOrFail($id);
        $game->update([
            'player2_id' => auth()->id(),
            'status' => 'playing',
        ]);

        return redirect()->route('games.play', $game->id);
    }

    public function play($id)
    {
        $game = Game::findOrFail($id);
        $word = Word::inRandomOrder()->first()->word; // Haal een willekeurig woord op
        return view('games.play', compact('game', 'word'));
    }
}
