@extends('base.app')

@section('content')
    <main>
        <h1 class="text-3xl font-bold underline">
            Create
        </h1>

        <form action="post">
            @csrf
            <input type="text">
            <input type="textarea">
        </form>
    </main>
@endsection
