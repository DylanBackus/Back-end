<?php
// app/Http/Controllers/WordController.php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function create()
    {
        return view('words.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'word' => 'required|string|unique:words|max:255',
        ]);

        Word::create([
            'word' => $request->word,
        ]);

        return redirect()->route('words.create')->with('success', 'Woord toegevoegd!');
    }
}
