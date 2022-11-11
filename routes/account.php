<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::post('/save_avatar', [AccountController::class, 'saveAvatar'])->name('saveAvatar');
Route::post('/change_credential', [AccountController::class, 'changeCredentialForUser'])->name('changeCredentialForUser');
