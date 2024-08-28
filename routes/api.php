<?php

use App\Http\Controllers\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/participant', [Participant::class, 'store']);
