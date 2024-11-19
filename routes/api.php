<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::resource('FullTask', TaskController::class);
Route::patch('FullTask/done/{id}', [TaskController::class, 'done']);
Route::patch('FullTask/delete/{id}', [TaskController::class, 'DeleteTask']);
// Route::get('FullTask/', [TaskController::class, 'DeleteTask']);

