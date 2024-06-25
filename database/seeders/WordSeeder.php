<?php
// database/seeders/WordSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Word;

class WordSeeder extends Seeder
{
    public function run()
    {
        $words = ['apple', 'banana', 'cherry', 'date', 'elderberry'];
        
        foreach ($words as $word) {
            Word::create(['word' => $word]);
        }
    }
}
