@extends('layouts.app')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>Task Details</p>
    <a href="{{ route('task.edit', $task->id) }}">Edit</a>
@endsection