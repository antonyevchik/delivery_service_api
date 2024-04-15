<?php

use App\Http\Controllers\ShipmentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'delivery/{delivery}/shipments'], function () {
        Route::get('/', [ShipmentsController::class, 'index'])->name('shipments.index');
        Route::get('/find-by-id/{shipment}', [ShipmentsController::class, 'findById'])->name('shipments.find-by-id');
        Route::post('/', [ShipmentsController::class, 'store'])->name('shipments.store');
        Route::put('/{shipment}', [ShipmentsController::class, 'update'])->name('shipments.update');
        Route::delete('/{shipment}', [ShipmentsController::class, 'destroy'])->name('shipments.destroy');
    });
});
