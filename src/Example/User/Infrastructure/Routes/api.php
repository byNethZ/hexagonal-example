<?php

use Src\Example\User\Infrastructure\Controllers\UserFindAllController;
use Illuminate\Support\Facades\Route;

Route::get('/', UserFindAllController::class);
