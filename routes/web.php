<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\GameController;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('user.editProfile');
    Route::post('/edit-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');

    Route::get('/friends', [FriendController::class, 'index'])->name('friends.index');
    Route::post('/add-friend', [FriendController::class, 'addFriend'])->name('friends.addFriend');
    Route::post('/accept-friend/{id}', [FriendController::class, 'acceptFriend'])->name('friends.acceptFriend');
    Route::post('/reject-friend/{id}', [FriendController::class, 'rejectFriend'])->name('friends.rejectFriend');

    Route::get('/games', [GameController::class, 'index'])->name('games.index');
    Route::post('/create-game', [GameController::class, 'create'])->name('games.create');
    Route::post('/join-game/{id}', [GameController::class, 'join'])->name('games.join');
    Route::get('/play-game/{id}', [GameController::class, 'play'])->name('games.play');
    Route::post('/save-result/{id}', [GameController::class, 'saveResult'])->name('games.saveResult');
});

// Voor debugging en testdoeleinden
Route::get('/test', function () {
    return 'Hello, world!';
});
