<!DOCTYPE html>

<html>

<head>
    <title>My Task List</title>
</head>

<body>

    <h1>
        Tasks
    </h1>
    <ul>
        @forelse ($tasks as $task)
            <li>
                <h3>{{ $task->title }}</h3>
                <h4>{{ $task->description }}</h4>
                <p>{{ $task->id }}</p>
            </li>

        @empty
            <h1>There are no tasks</h1>
        @endforelse

    </ul>

</body>

</html>
