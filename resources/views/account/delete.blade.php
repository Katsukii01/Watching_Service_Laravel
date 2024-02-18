<!-- resources/views/account/delete.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Delete Account</h1>
    <p>Are you sure you want to delete your account? This action cannot be undone.</p>

    <form action="{{ route('delete.account') }}" method="post">
        @csrf
        @method('DELETE')

        <div class="mb-3">
            <label for="password" class="form-label">Enter your password to confirm:</label>
            <div class="col-md-6">
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-danger">Confirm Deletion</button>
    </form>
</div>
@endsection
