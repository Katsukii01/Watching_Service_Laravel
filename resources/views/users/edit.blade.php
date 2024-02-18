@extends('layouts.app')

@section('content')
    <div class="bg-dark container">
    @if(auth()->check() && auth()->user()->id == 2)
        <h2>Edit User</h2>

        <!-- Formularz edycji użytkownika -->
        <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password (leave blank to keep current password):</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Avatar:</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            </div>
            <!-- Dodaj inne pola edycji użytkownika według potrzeb -->
            <br>
            <button type="submit" class="btn btn-warning">Update User</button>
        </form>
        <br>
        <a class="btn btn-primary" href="/users">go back</a>
        @else
            <p>Access denied.</p>
        @endif
    </div>
@endsection
