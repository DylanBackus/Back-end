<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WordController;



Route::get('/', function () {
    return view('welcome');
});

// Random words uit database
Route::get('/words/create', [WordController::class, 'create'])->name('words.create');
Route::post('/words', [WordController::class, 'store'])->name('words.store');

// Authentication Routes
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Registration Routes
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

// Game Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/games', [GameController::class, 'index'])->name('games.index');
    Route::post('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games/join/{id}', [GameController::class, 'join'])->name('games.join');
    Route::get('/games/{id}', [GameController::class, 'play'])->name('games.play');
    Route::post('/games/{id}/result', [GameController::class, 'saveResult'])->name('games.saveResult');
});

// Friend Routes
Route::middleware(['auth'])->group(function () {
    Route::post('friend/add', [FriendController::class, 'add'])->name('friend.add');
    Route::post('friend/accept', [FriendController::class, 'accept'])->name('friend.accept');
    Route::post('friend/decline', [FriendController::class, 'decline'])->name('friend.decline');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
