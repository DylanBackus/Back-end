<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_words_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('word')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('words');
    }
}

