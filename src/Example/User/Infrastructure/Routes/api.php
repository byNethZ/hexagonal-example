<?php

use Src\Example\User\Infrastructure\Controllers\UserFindAllController;
use Illuminate\Support\Facades\Route;
use Src\Example\User\Infrastructure\Controllers\UserDeleteByIdController;
use Src\Example\User\Infrastructure\Controllers\UserFindByIdController;
use Src\Example\User\Infrastructure\Controllers\UserSaveController;

Route::get('/', UserFindAllController::class);
Route::get('/{id}', UserFindByIdController::class);
Route::delete('/{id}', UserDeleteByIdController::class);
Route::post('/', UserSaveController::class);
