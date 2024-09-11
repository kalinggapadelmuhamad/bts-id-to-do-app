<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CheckListController;
use App\Http\Controllers\Api\CheckListItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('checklist', CheckListController::class);

    Route::prefix('checklist')->group(function () {
        Route::get('{checklist}/item', [CheckListItemController::class, 'index']);
        Route::post('{checklist}/item', [CheckListItemController::class, 'store']);

        Route::get('{checklist}/item/{checklistitemid}', [CheckListItemController::class, 'getChecklistItemById']);
        Route::put('{checklist}/item/{checklistitemid}', [CheckListItemController::class, 'updateChecklistItemById']);
        Route::delete('{checklist}/item/{checklistitemid}', [CheckListItemController::class, 'deleteChecklistItemById']);

        Route::put('{checklist}/item/rename/{checklistitemid}', [CheckListItemController::class, 'renameChecklistItemById']);
    });
});
