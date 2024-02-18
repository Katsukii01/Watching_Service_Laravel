@extends('layouts.app')

@section('content')
    <div class="bg-dark container">
    @if(auth()->check() && auth()->user()->id == 2)
        <h2>Add new user</h2>

        <!-- Formularz dodawania użytkownika -->
        <form method="post" action="{{ route('users.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- Dodaj inne pola formularza użytkownika według potrzeb -->

            <button type="submit" class="btn btn-primary">Add User</button>
        </form>

        <h2 class="mt-4">User List</h2>


            @foreach($users as $user)
            @if($user->id !=2)
            <div class="row align-items-center ">
            <div class="col-2  ">
                    <img class="rounded-circle shadow-1-strong me-3"
                    src="http://127.0.0.1:8000/{{ $user->img }}" alt="avatar" width="60" height="60" />
            </div>
            <div class="col-2  ">
                    {{ $user->name }}
            </div>
            <div class="col-2  ">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
            </div>
            <div class="col-2  ">
                    <form method="post" onsubmit="return confirmDelete()" action="{{ route('users.destroy', $user->id) }}" style="display: inline;" >
                        @csrf
                        @method('DELETE')
                        <button onclick="" type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </div>
            </div>
            @endif
            @endforeach
        @else
            <p>Access denied.</p>
        @endif
    </div>
@endsection
