<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
<h2>Login</h2>

<form method="POST" action="{{ route('login.submit') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
    @error('email') <p style="color:red;">{{ $message }}</p> @enderror

    <input type="password" name="password" placeholder="Password" required>
    @error('password') <p style="color:red;">{{ $message }}</p> @enderror

    <button type="submit">Login</button>
</form>
@endsection
