<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/v1/hello', function () {
    return response()->json([
        'message' => 'Hello from Laravel API',
    ]);
});
