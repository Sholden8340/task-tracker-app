@extends('base.app')

@section('content')
    <h1 class="text-3xl font-bold underline">
        Tasks
    </h1>

    @isset($tasks)
        @foreach ($tasks as $task)
            <section class="border-4 rounded-lg bg-cyan-100 p-5 mb-5">
                <h3>{{ $task->name }}</h2>
                    <p>
                        {{ $task->description }}
                    </p>
                    <p>Task status: {{ $task->is_complete }}</p>

                    {{-- change status --}}
                    <form action="{{ route("edit") }}" method="POST">
                        @csrf
                        <button>Mark Complete</button>
                    </form>

                    {{-- Probably shouldn't be the same route as update --}}
                    <form action="{{ route("edit") }}" method="POST">
                        @csrf
                        <button>Mark Incomplete</button>
                    </form>

                    <form action="{{ route("edit") }}" method="POST">
                        @csrf
                        <button>Update Task</button>
                    </form>

                    <form action="{{ route("delete") }}" method="POST">
                        @csrf
                        <button>Delete Task</button>
                    </form>

            </section>
        @endforeach
    @endisset


@endsection
