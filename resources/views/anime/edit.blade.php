@extends('layouts.app')

@section('content')
    @if(auth()->check() && auth()->user()->id == 2)
    <div class="container">
        <h2>Edit Anime</h2>

        <form method="post" action="{{ route('anime.update', $anime->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $anime->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $anime->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" class="form-control" id="link" name="link" value="{{ $anime->link }}" required>
            </div>

            <div class="form-group">
                <label for="previmg">Preview Image:</label>
                <input type="file" class="form-control" id="previmg" name="previmg" accept="image/*">
            </div>

            <div class="form-group">
                <label for="likes">Likes:</label>
                <input type="number" class="form-control" id="likes" name="likes" value="{{ $anime->likes }}" required>
            </div>

            <div class="form-group">
                <label for="dislikes">Dislikes:</label>
                <input type="number" class="form-control" id="dislikes" name="dislikes" value="{{ $anime->dislikes }}" required>
            </div>
            <br>
            <button type="submit" class="btn btn-warning">Update Anime</button>
        </form>
        <br>
        <a class="btn btn-primary" href="/anime/create">go back</a>
        @else
            <p>Access denied.</p>
        @endif
    </div>
@endsection
