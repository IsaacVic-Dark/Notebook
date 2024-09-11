<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// two routes with the same URL will cause a conflict in that only one will be executed (the last one)
// Route::get('/dashboard', [NoteController::class, 'show'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [NoteController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

Route::get('/note/{id}', [NoteController::class, 'display'])->name('notes.display');

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
