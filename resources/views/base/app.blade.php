<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body class="bg-slate-200 justify-center m-5">
    <nav class="p-6 bg-white flex justify-between mb-4">
        <ul class="flex items-center">
            <li><a href="/" class="p-3">Home</a></li>
            <li><a href="{{ route('task') }}" class="p-3">All tasks</a></li>
            <li><a href="{{ route('tasks.complete') }}" class="p-3">Completed tasks</a></li>
            <li><a href="{{ route('tasks.incomplete') }}" class="p-3">Incompleted tasks</a></li>
            <li><a href="{{ route('create') }}" class="p-3">Create a new task</a></li>
            {{-- <li><a href="{{ route('delete') }}" class="p-3">Delete</a></li> --}}
        </ul>
        <ul class="flex items-center">
            {{-- <li><a href="{{ route('login') }}"" class="p-3">Login</a></li>
            <li><a href="{{ route('logout') }}"" class="p-3">Logout</a></li> --}}

        </ul>
    </nav>
    @yield('content')
</body>

</html>
