@extends('base.app')

@section('content')
    <main class="flex justify-center">


        <div class="bg-white p-6 rounded-lg w-1/2">

            <h1 class="text-3xl font-bold mb-6">
                Create a new task
            </h1>

            <form action="{{ route('task') }}" method="POST">
                <div class="mb-6">

                    @csrf
                    <label for="name" class="sr-only">Task name:</label>
                    <input type="text" name="name" id="name" placeholder="Task name"
                        class="bg-gray-100 mb-6 border-2 w-1/2 p-4 rounded-sm @error('name') border-red-500 @enderror"
                        required value="{{ old('name') }}">

                    @error('name')
                        <span class="text-red-500 w-full"> {{ $message }}</span>
                    @enderror

                    {{-- <label for="description" class="sr-only"></label> --}}

                    <textarea name="description" id="description"
                        placeholder="Task description"class="bg-gray-100 mb-6 border-2 w-full p-4 rounded-sm h-60"
                        value="{{ old('description') }}"></textarea>

                    <button type="submit" class="bg-blue-500 boder-2 w-full p-4 rounded-lg text-white font-medium">Create
                        Task</button>
                </div>
            </form>

        </div>
    </main>
@endsection
