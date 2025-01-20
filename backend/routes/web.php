<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProgramDetailController;

Route::get('/api/programs', [ProgramDetailController::class, 'index']);
