<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/display', [NoteController::class, 'display'])
    ->middleware(['auth', 'verified'])
    ->name('display');

Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

Route::get('/note/{id}', [NoteController::class, 'show'])->name('note.show');

Route::get('/notes/{note}',[NoteController::class, 'update'])->name('notes.update');

Route::get('/note/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');

Route::get('/create',[NoteController::class, 'create'])->name('create');

Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');

Route::put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
