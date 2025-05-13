<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsViewController;
use App\Http\Controllers\StatementsViewController;
use App\Http\Controllers\StatementMarksViewController;

Route::redirect('/', '/statements');

Route::get('/students', [StudentsViewController::class, 'index']);
Route::get('/students/create', [StudentsViewController::class, 'create']);
Route::get('/students/{id}', [StudentsViewController::class, 'show']);
Route::post('/students', [StudentsViewController::class, 'store']);
Route::put('/students/{id}', [StudentsViewController::class, 'update']);
Route::delete('/students/{id}', [StudentsViewController::class, 'destroy']);

Route::get('/statements/{id}', [StatementsViewController::class, 'show']);
Route::get('/statements', [StatementsViewController::class, 'index']);
Route::post('/statements', [StatementsViewController::class, 'store']);
Route::delete('/statements/{id}', [StatementsViewController::class, 'destroy']);

Route::post('/statements/marks', [StatementMarksViewController::class, 'store']);
Route::delete('/statements/marks/{id}', [StatementMarksViewController::class, 'destroy']);
Route::put('/statements/marks/{id}', [StatementMarksViewController::class, 'update']);