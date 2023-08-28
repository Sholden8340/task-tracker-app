@extends('base.app')

@section('content')

    <main class="bg-white content-center p-6 rounded-lg mx-auto w-4/5">

        <h1 class="text-3xl font-bold block">
            {{ $heading }}
        </h1>
        @isset($tasks)
            @foreach ($tasks as $task)
                <section class="border-4 border-black rounded-lg bg-cyan-100 p-5 mb-5 w-1/2">

                    <div class="">
                        @if ($task->is_complete)
                            <span class="max-h-3 inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </span>
                        @endif
                        <h2 class="font-bold inline-block">
                            @if ($task->is_complete)
                            @endif
                            {{ $task->name }}
                        </h2>
                    </div>
                    <p class="block">
                        {{ $task->description }}
                    </p>
                    <p>Task status: {{ $task->is_complete ? 'Complete' : 'Incomplete' }}</p>

                    <div class="flex">

                        @if (!$task->is_complete)
                            <form action="{{ route('task.complete', $task) }}" method="POST" class="p-4">
                                @csrf
                                @method('PUT')
                                <button class="bg-blue-500 boder-2 p-4 rounded-lg text-white font-medium">Mark Complete</button>
                            </form>
                        @else
                            <form action="{{ route('task.incomplete', $task) }}" method="POST" class="p-4">
                                @csrf
                                @method('DELETE')
                                <button class="bg-blue-500 boder-2 p-4 rounded-lg text-white font-medium">Mark
                                    Incomplete</button>
                            </form>
                        @endif


                        <form action="{{ route('task.edit', $task) }}" method="POST" class="p-4">
                            @csrf
                            @method('PUT')
                            <button class="bg-blue-500 boder-2 p-4 rounded-lg text-white font-medium">Update
                                Task</button>
                        </form>

                        <form action="{{ route('task.delete', $task) }}" method="POST" class="p-4">
                            @csrf
                            @method('DELETE')
                            <button class="bg-blue-500 boder-2 p-4 rounded-lg text-white font-medium">Delete
                                Task</button>
                        </form>
                    </div>
                </section>
            @endforeach
        @else
            <p>No more tasks!</p>
        @endisset
    </main>

@endsection
