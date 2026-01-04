<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

use Illuminate\View\View;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/about', function () {
    return 'About Us Page';
});

Route::get('/tasks', function () {
    $tasks = Task::paginate(10);
    return view('index', ['tasks' => $tasks]);
})->name('tasks.index');

Route::get('/tasks/create', function () {
    return view('create');
})->name('tasks.create');

Route::get('/tasks/{id}', function (int $id) {
    $task = Task::findOrFail($id);

    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function () {
    $validated = request()->validate([
        'title' => 'required|max:255',
        'description' => 'required',
    ]);

    $task = Task::create($validated);

    return redirect()->route('tasks.show', ['id' => $task->id]);
})->name('tasks.store');

Route::get('/tasks/{id}/edit', function (int $id) {
    return "Edit Task {$id} Page";
})->name('tasks.edit');
