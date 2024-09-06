<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HelloWorldController;

Route::get('/hello', [HelloWorldController::class, 'hello']);
Route::get('/info', [HelloWorldController::class, 'info']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
