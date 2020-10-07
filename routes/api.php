<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/category', 'CategoryController');
Route::resource('/ticket', 'TicketController');
Route::resource('/transaction', 'TransactionController');
