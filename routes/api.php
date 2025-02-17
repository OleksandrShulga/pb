<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CreditController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\RequestController;

Route::post('/credit', [CreditController::class, 'calculateCredit']);

Route::middleware('api')->group(function () {

    Route::get('/clients', [ClientController::class, 'index']);  // Отримати всіх клієнтів
    Route::post('/client', [ClientController::class, 'store']);  // Зберегти клієнта
    Route::delete('/client/{id}', [ClientController::class, 'destroy']);  // Видалити клієнта

    Route::get('/requests', [RequestController::class, 'index']); // Отримати всі запити

});
