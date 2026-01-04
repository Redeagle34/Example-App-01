<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return 'About Us Page';
});

Route::get('/tasks', function () {
    $veces = 23;
    return view('index', ['veces' => $veces]);
});

Route::get('/tasks/{id}', function (int $id) {
    return view('show', ['id' => $id]);
});
