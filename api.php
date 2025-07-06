<?php
use App\Http\Controllers\Api\GuestController;
use Illuminate\Support\Facades\Route;


Route::apiResource('guests', GuestController::class);


// Could be instead:

// Route::post('/guests', [GuestController::class, 'store']);

// Route::get('/guests', [GuestController::class, 'index']);

// Route::get('/guests/{id}', [GuestController::class, 'show']);

// Route::patch('/guests/{id}', [GuestController::class, 'update']);

// Route::delete('/guests/{id}', [GuestController::class, 'destroy']);

// Comment by Abdullah
