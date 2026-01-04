<!DOCTYPE html>

<html>

<head>

</head>

<body>


    <h1>{{ $task->title }}</h1>
    <h2>{{ $task->description }}</h2>
    <p>{{ $task->id }}</p>

    <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit</a>

</body>

</html>
