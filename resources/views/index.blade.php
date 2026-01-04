<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>My Task List</title>

    <style type="text/tailwindcss">
        @theme {
            --color-clifford: #da373d;
        }

        .btn {
            @apply inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <header class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">
                📋 My Tasks
            </h1>
            <p class="text-gray-600">Manage your daily tasks efficiently</p>
        </header>

        <div class="mb-6">
            <a href="{{ route('tasks.create') }}" class="btn">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Create New Task
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            @forelse ($tasks as $task)
                <div class="border-b border-gray-200 last:border-b-0">
                    <a href="{{ route('tasks.show', ['id' => $task->id]) }}"
                        class="block p-6 hover:bg-gray-50 transition duration-200 ease-in-out group">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-3 h-3 bg-green-500 rounded-full flex-shrink-0"></div>
                                <h3
                                    class="text-lg font-medium text-gray-800 group-hover:text-blue-600 transition duration-200">
                                    {{ $task->title }}
                                </h3>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>
                </div>
            @empty
                <div class="p-12 text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-600 mb-2">No tasks yet</h3>
                    <p class="text-gray-500 mb-6">Start by creating your first task to stay organized!</p>
                    <a href="{{ route('tasks.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Create Task
                    </a>
                </div>
            @endforelse
        </div>

        @if ($tasks->hasPages())
            <div class="mt-8">
                <nav
                    class="flex items-center justify-between px-4 py-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="flex items-center text-sm text-gray-500">
                        <span>Showing {{ $tasks->firstItem() }} to {{ $tasks->lastItem() }} of {{ $tasks->total() }}
                            results</span>
                    </div>

                    <div class="flex items-center space-x-2">
                        @if ($tasks->onFirstPage())
                            <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
                                Previous
                            </span>
                        @else
                            <a href="{{ $tasks->previousPageUrl() }}"
                                class="px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition duration-200">
                                Previous
                            </a>
                        @endif

                        <div class="flex items-center space-x-1">
                            @foreach ($tasks->getUrlRange(1, $tasks->lastPage()) as $page => $url)
                                @if ($page == $tasks->currentPage())
                                    <span class="px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-md">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition duration-200">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        @if ($tasks->hasMorePages())
                            <a href="{{ $tasks->nextPageUrl() }}"
                                class="px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition duration-200">
                                Next
                            </a>
                        @else
                            <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
                                Next
                            </span>
                        @endif
                    </div>
                </nav>
            </div>
        @endif
    </div>

</body>

</html>
