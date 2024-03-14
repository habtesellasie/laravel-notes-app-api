<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/notes', [NoteController::class, 'index']);
Route::get('/notes/{note}', [NoteController::class, 'show']);

Route::get('/notes/{id}/edit', [NoteController::class, 'edit']);
Route::delete('/notes/{id}', [NoteController::class, 'destroy']);
Route::post('/notes/store', [NoteController::class, 'store']);
Route::put('/notes/update', [NoteController::class, 'update']);
