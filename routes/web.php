<?php

use App\Http\Controllers\DealController;
use Illuminate\Support\Facades\Route;

// Route for creating a new deal
Route::post('/deals', [DealController::class, 'create'])->name('deals.create');

// Route for updating an existing deal
Route::put('/deals/{id}', [DealController::class, 'update'])->name('deals.update');

// Route for moving a deal to a different stage
Route::patch('/deals/{id}/move-stage', [DealController::class, 'moveStage'])->name('deals.moveStage');

//Route for filtering and viewing deals by stage, sales representative and account
Route::get('/deals/filter', [DealController::class, 'filterBy'])->name('deals.filterBy');

// Route for generating reports on deals by stage within specified data ranges
Route::get('/deals/reports', [dealController::class, 'generateReport'])->name('deals.generateReport');
