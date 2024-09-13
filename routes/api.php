<?php

use App\Http\Controllers\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/participant', [Participant::class, 'store']);
Route::get('/participant/all', [Participant::class, 'getAll']);
Route::get('/participant/paginate/{pageNumber}/{limitPage}', [Participant::class, 'paginate']);
Route::post('/participant/update', [Participant::class, 'update']);
Route::post('/participant/delete', [Participant::class, 'destroy']);
