<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DisciplinesController;
use App\Http\Controllers\Api\ControlTypesController;
use App\Http\Controllers\Api\StudentsController;
use App\Http\Controllers\Api\StatementsController;
use App\Http\Controllers\Api\StatementMarksController;
use App\Http\Controllers\Api\MarkTypesController;
use App\Http\Controllers\Api\TeachersController;
use App\Http\Controllers\Api\GroupsController;

Route::middleware('json.response')->group(function () {
        Route::apiResource('disciplines', DisciplinesController::class);
        Route::apiResource('control_types', ControlTypesController::class);
        Route::apiResource('students', StudentsController::class);
        Route::apiResource('statements', StatementsController::class);
        Route::apiResource('statement_marks', StatementMarksController::class);
        Route::apiResource('mark_types', MarkTypesController::class);
        Route::apiResource('teachers', TeachersController::class);
        Route::apiResource('groups', GroupsController::class);
});