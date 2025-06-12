@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="">Title:</label>
        <input type="text" name="title" value="{{ $task->title }}">
        @error('title')
            <div>{{ $message }}</div>
        @enderror

        <label for="">Description:</label>
        <input type="text" name="description" value="{{ $task->description }}">
        @error('description')
            <div>{{ $message }}</div>
        @enderror
        
        <label for="">Due_date:</label>
        <input type="text" name="due_date" value="{{ $task->due_date }}">
        @error('due_date')
            <div>{{ $message }}</div>
        @enderror
        
        <label for="">Is_completed:</label>
        <input type="hidden" name="is_completed" value="0">
        <input type="checkbox" name="is_completed" value="1" {{ old('is_completed', $task->is_completed ?? false) ? 'checked' : '' }}>
        @error('is_completed')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">
            Update
        </button>
    </form>
@endsection