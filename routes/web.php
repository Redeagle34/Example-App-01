<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return 'About Us Page';
});

Route::get('/tasks', function () {
    $tasks = Task::all();
    return view('index', ['tasks' => $tasks]);
});

Route::get('/tasks/{id}', function (int $id) {
    $task = Task::findOrFail($id);

    return view('show', ['task' => $task]);
});
