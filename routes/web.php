<?php

use Illuminate\Support\Facades\Route;

Route::middleware('jwt.auth')->get('/protected', function () {
    return response()->json(['message' => 'JWT Authentication is working!']);
});

Route::get('/', function () {
    return view('welcome');
});
