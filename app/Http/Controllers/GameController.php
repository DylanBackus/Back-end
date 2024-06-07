<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameResult;
use Auth;

class GameController extends Controller
{
    // Toon beschikbare spellen
    public function index()
    {
        $games = Game::where('status', 'waiting')->orWhere('status', 'active')->get();
        return view('games.index', compact('games'));
    }

    // Start een nieuw spel
    public function create(Request $request)
    {
        $game = new Game();
        $game->player1_id = Auth::id();
        $game->status = 'waiting';
        $game->save();

        return redirect()->route('games.index')->with('success', 'Nieuw spel aangemaakt. Wacht op tegenstander.');
    }

    // Accepteer speluitnodiging
    public function join($id)
    {
        $game = Game::find($id);

        if ($game->status != 'waiting') {
            return redirect()->back()->with('error', 'Dit spel is al gestart.');
        }

        $game->player2_id = Auth::id();
        $game->status = 'active';
        $game->save();

        return redirect()->route('games.play', ['id' => $game->id])->with('success', 'Je hebt het spel geaccepteerd.');
    }

    // Speel het spel
    public function play($id)
    {
        $game = Game::find($id);
        return view('games.play', compact('game'));
    }

    // Sla spelresultaten op
    public function saveResult(Request $request, $id)
    {
        $game = Game::find($id);
        $gameResult = new GameResult();
        $gameResult->game_id = $game->id;
        $gameResult->winner_id = $request->winner_id;
        $gameResult->loser_id = $request->loser_id;
        $gameResult->result = $request->result;
        $gameResult->save();

        $game->status = 'completed';
        $game->save();

        return redirect()->route('games.index')->with('success', 'Spelresultaten opgeslagen.');
    }
}
