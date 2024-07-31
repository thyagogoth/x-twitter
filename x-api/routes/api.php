<?php

use App\Http\Controllers\TweetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])
->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/tweets',           [TweetController::class, 'index'])->name('tweets.index');
    // Route::get('/tweets/{id}',      [TweetController::class, 'show'])->name('tweets.show');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
    // Route::put('/tweets/{id}',      [TweetController::class, 'update'])->name('tweets.update');
    // Route::delete('/tweets/{id}',   [TweetController::class, 'destroy'])->name('tweets.destroy');

});
