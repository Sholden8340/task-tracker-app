@extends('base.app')

@section('content')
    <main class="flex justify-center">
        <div class="bg-white p-6 rounded-lg w-4/5">
            <h1 class="text-3xl font-bold underline">
                Index
            </h1>
            {{-- Task list --}}

            {{-- Task --}}
            <section class="border-4 rounded-lg bg-cyan-100 p-5">
                <h2>Task Title</h2>
                <p>
                    Task description
                </p>
                <p>Task status: xyz</p>

                {{-- change status --}}
                <form action="post">
                    <button>Mark Complete</button>
                    <button>Mark Incomplete</button>
                    <button>Delete Task</button>
                </form>

            </section>
        </div>
    </main>
@endsection
