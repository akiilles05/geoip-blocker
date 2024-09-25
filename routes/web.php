<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\BlockCaliforniaUsers;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/restricted', function () {
    return view('restricted');
})->middleware(BlockCaliforniaUsers::class);