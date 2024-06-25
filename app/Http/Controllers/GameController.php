<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all(); // Hier halen we alle spellen op
        return view('games.index', compact('games')); // Dit retourneert een view met de spellen
    }

    public function create(Request $request)
    {
        // Logica voor het aanmaken van een nieuw spel
    }

    public function join($id)
    {
        // Logica voor het joinen van een spel
    }

    public function play($id)
    {
        // Logica voor het spelen van een spel
    }

    public function saveResult(Request $request, $id)
    {
        // Logica voor het opslaan van het spelresultaat
    }
}
