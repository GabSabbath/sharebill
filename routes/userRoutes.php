<?php

use App\Http\Controllers\UserController;

Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('{user}', 'show')->can('view', 'user');
        Route::patch('{user}', 'update')->can('update', 'user');
    });
}
);
