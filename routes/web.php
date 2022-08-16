<?php

use Illuminate\Support\Facades\Route;

Route::mailPreview();

Route::get('/', function () {
    return view('adminlte::page');
})->middleware(['auth', 'verified']);
