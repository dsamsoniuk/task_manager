<?php

use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})
->middleware(['auth', 'verified'])
->name('dashboard');


// Route::get('/user', [UserController::class, 'user']);

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::resource('users', UserController::class);
});

Route::prefix('dashboard')
        ->name('dashboard.')
        ->middleware(['auth', 'verified'])
        ->group(function () {
            Route::resource('projects', ProjectController::class);
    });

Route::prefix('dashboard/project-notes')
    ->name('project-notes.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/{project}', [ProjectController::class, 'showNotes'])->name('showNotes');
        Route::get('/{project}/by-page/{page}', [ProjectController::class, 'notesByPage'])->name('notesByPage');
    });

Route::prefix('dashboard/notes/create-by-project')
    ->name('project-notes.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/{project}', [NoteController::class, 'createByProject'])->name('createByProject');
    });

Route::prefix('dashboard/notes')
    ->name('note-hide.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::put('/{note}/hide', [NoteController::class, 'hide'])->name('hide');
        Route::get('/by-page/{page}', [NoteController::class, 'indexByPage'])->name('indexByPage');
    });


Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::resource('notes', NoteController::class);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
