@extends('layouts.app')

@section('content')
    <h1>All Tasks</h1>
    <a href="{{ route('tasks.create') }}">Create Task</a>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
                <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection