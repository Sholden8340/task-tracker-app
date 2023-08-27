@extends('base.app')

@section('content')

    <main class="bg-white content-center">

        <h1 class="text-3xl font-bold underline">
            Tasks
        </h1>


        @isset($tasks)
            @foreach ($tasks as $task)
                <section class="border-4 border-black rounded-lg bg-cyan-100 p-5 mb-5 w-1/2">
                    <h2 class=" font-bold">{{ $task->name }}</h2>
                    <p>
                        {{ $task->description }}
                    </p>
                    <p>Task status: {{ $task->is_complete ? 'Complete' : 'Incomplete' }}</p>

                    <div class="flex">

                        {{-- {{ dd($task->id) }} --}}
                        <form action="{{ route('task.complete', $task) }}" method="POST" class="p-4">
                            @csrf
                            @method('PUT')
                            <button class="bg-blue-500 boder-2 p-4 rounded-lg text-white font-medium">Mark Complete</button>
                        </form>

                        <form action="{{ route('task.incomplete', $task) }}" method="POST" class="p-4">
                            @csrf
                            @method('PUT')
                            <button class="bg-blue-500 boder-2 p-4 rounded-lg text-white font-medium">Mark
                                Incomplete</button>
                        </form>

                        <form action="{{ route('task.edit', $task) }}" method="POST" class="p-4">
                            @csrf
                            @method('DELETE')
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
        @endisset
    </main>

@endsection
