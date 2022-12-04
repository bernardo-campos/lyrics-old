<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\SongController;
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
    // Route::get('/{artist}','show')->name('show');
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
    // Route::get('/{album}','show')->name('show');
    Route::get('/{album}/edit','edit')->name('edit');
    Route::put('/{album}','update')->name('update');
    Route::delete('/{album}','destroy')->name('destroy');
});

Route::group([
    'as'            => 'songs.',
    'prefix'        => 'songs',
    'controller'    => SongController::class,
], function () {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
    // Route::get('/{song}','show')->name('show');
    Route::get('/{song}/edit','edit')->name('edit');
    Route::put('/{song}','update')->name('update');
    Route::delete('/{song}','destroy')->name('destroy');
});
