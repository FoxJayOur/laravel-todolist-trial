<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskListController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('dashboard/tasks')->group(function () {
        Route::get('/', [TaskListController::class, 'index'])->name('tasks');
        Route::get('/create', [TaskListController::class, 'create'])->name('tasksCreate');
        Route::post('/', [TaskListController::class, 'store'])->name('tasksStore');
        Route::get('/view', [TaskListController::class, 'view'])->name('tasksView');
        Route::get('/{task}/update', [TaskListController::class, 'update'])->name('tasksUpdate');
        Route::put('/{task}/save', [TaskListController::class, 'save'])->name('tasksSave');
        Route::delete('/{task}/delete', [TaskListController::class, 'delete'])->name('tasksDelete');
    });

    Route::prefix('dashboard/users')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('users');
        Route::get('/create', [UsersController::class, 'create'])->name('usersCreate');
        Route::post('/', [UsersController::class, 'register'])->name('usersStore');
        Route::get('/view', [UsersController::class, 'view'])->name('usersView');
        Route::get('/{user}/update', [UsersController::class, 'update'])->name('usersUpdate');
        Route::put('/{user}/save', [UsersController::class, 'save'])->name('usersSave');
        Route::delete('/{user}/delete', [UsersController::class, 'delete'])->name('usersDelete');
    });
});
