<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return 'About Us Page';
});

Route::get('/tasks', function () {
    return 'Index for tasks';
});

Route::get('/tasks/{id}', function (int $id) {
    return $id;
});
