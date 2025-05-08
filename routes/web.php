<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-firebird', function() {
    try {
        $results = DB::connection('firebird')
                   ->select("SELECT * FROM RDB\$RELATIONS WHERE RDB\$SYSTEM_FLAG = 0");
        
        return Response::json([
            'status' => 'success',
            'data' => $results
        ], 200, [], JSON_PRETTY_PRINT);

    } catch (\Exception $e) {
        return Response::json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});
