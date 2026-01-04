<!DOCTYPE html>

<html>

<head>
    <title>My Task List</title>
</head>

<body>

    <h1>
        Create a Task
    </h1>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <button type="submit">Create Task</button>
    </form>
</body>

</html>
