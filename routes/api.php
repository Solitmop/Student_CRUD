<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DisciplinesController;
use App\Http\Controllers\Api\ControlTypesController;


Route::middleware('json.response')->group(function () {
    Route::apiResource('disciplines', DisciplinesController::class);
});

Route::middleware('json.response')->group(function () {
    Route::apiResource('control_types', ControlTypesController::class);
});

/*Route::get('/test', function() {
    return response()->json(['message' => 'API works']);
});*/

Route::get('/encoding-test', function() {
    $data = App\Models\Disciplines::first();
    return [
        'raw' => $data->DISC_NAME,
        'hex' => bin2hex($data->DISC_NAME),
        'converted' => iconv('Windows-1251', 'UTF-8//IGNORE', $data->DISC_NAME)
    ];
});