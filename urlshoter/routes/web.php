<?php

use Illuminate\Support\Facades\Route;

$base_url="App\Http\Controllers";

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',$base_url.'\UrlController@home')->middleware(['auth'])->name('dashboard');
Route::get('/urltables/{id}',$base_url.'\UrlController@getAllUrl')->middleware(['auth'])->name('urltable');
Route::get('/shot/{code}',$base_url.'\UrlController@toOrginalUrl')->name('shoturl');
Route::get('/delete/{id}',$base_url.'\UrlController@delteUrl')->middleware(['auth'])->name('delete');

require __DIR__.'/auth.php';
