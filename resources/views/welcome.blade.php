<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    @vite('resources/css/app.css')

</head>

<body>

    <div class="bg-gray-100 dark:bg-gray-900">

        @include('layouts.navigation')


        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset
    </div>
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-16">
        <div class="px-4 py-2">
            <h1 class="text-gray-800 font-bold text-2xl uppercase">To-Do List</h1>
        </div>
        <form class="w-full max-w-sm mx-auto px-4 py-2" method="POST" action='/dashboard'>
            @csrf
            <div class="flex items-center border-b-2 border-teal-500 py-2">
                <input name="title"
                    class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none focus:ring-0"
                    type="text" placeholder="Add a task">
                <button
                    class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                    type="submit">
                    Add
                </button>
            </div>
        </form>

        @foreach($todos as $todo)
            <ul class="divide-y divide-gray-200 px-4">
                <li class="py-4">
                    <div class="flex items-center">
                        <div class="flex space-x-3">
                            <div>

                                <form method="POST" action="/{{$todo->id}}">
                                    @csrf
                                    @method('PATCH')
                                    <button id="todo1" name="todo1" type="submit"
                                        class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            fill="{{$todo->isDone ? '#0d9488' : 'none'}}" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" height=20 class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>
                                </form>

                            </div>
                            <div>

                                <form method="POST" action="/{{$todo->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button id="delete-{{$todo->id}}" name="delete-{{$todo->id}}" type="submit"
                                        class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" height="20" class=" size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </button>
                                </form>

                            </div>
                        </div>
                        <label for="todo1" class="ml-3 block text-gray-900">
                            <span class="text-lg font-medium"
                                style="{{ $todo->isDone ? 'text-decoration: line-through;' : '' }}">
                                {{ $todo->title }}
                            </span>
                        </label>
                    </div>
                </li>
            </ul>
        @endforeach  
    </div>
</body>

</html>