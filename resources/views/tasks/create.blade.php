@extends ('layouts.app')

@section('content')
    <h1>Create task</h1>

    <form action="{{ route('tasks.store') }}">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" placeholder="Task Title"><br>
        @error('title')
            <div>{{ $message }}</div>
        @enderror

        <label for="description">Description:</label>
        <input type="text" name="description" placeholder="Task Description"><br>
        @error('description')
            <div>{{ $message }}</div>
        @enderror

        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" placeholder="Due Date"><br>
        @error('due_date')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Create</button>
    </form>
@endsection