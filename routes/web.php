<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;

Route::mailPreview();

Route::get('/', function () {
    return view('adminlte::page');
})->middleware(['auth', 'verified']);

Route::group([
    'as'            => 'artists.',
    'prefix'        => 'artists',
    'controller'    => ArtistController::class,
], function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
    Route::get('/{artist}/edit','edit')->name('edit');
    Route::put('/{artist}','update')->name('update');
    Route::delete('/{artist}','destroy')->name('destroy');
});

Route::group([
    'as'            => 'albums.',
    'prefix'        => 'albums',
    'controller'    => AlbumController::class,
], function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
    Route::get('/{album}/edit','edit')->name('edit');
    Route::put('/{album}','update')->name('update');
    Route::delete('/{album}','destroy')->name('destroy');
});

