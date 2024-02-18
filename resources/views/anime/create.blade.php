@extends('layouts.app')

@section('content')
    <div class="container bg-dark">
    @if(auth()->check() && auth()->user()->id == 2)
        <h2>Add New Anime</h2>
            <form method="post" action="{{ route('anime.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" class="form-control" id="link" name="link" required>
            </div>
            <div class="form-group">
                <label for="previmg">Preview Image:</label>
                <input type="file" class="form-control" id="previmg" name="previmg" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="likes">Likes:</label>
                <input type="number" class="form-control" id="likes" name="likes" required>
            </div>
            <div class="form-group">
                <label for="dislikes">Dislikes:</label>
                <input type="number" class="form-control" id="dislikes" name="dislikes" required>
            </div>
            </p>
            <button type="submit" class="btn btn-primary">Add Anime</button>
            </form>
        <hr>
        <div class="container bg-dark">
        <h2>Anime List</h2>

            @foreach($anime as $a)
            <div class="row align-items-center ">
                <div class="col-2">
                    <img src="{{ asset('storage/prev/' . $a->previmg) }}" class="img-fluid rounded-circle mb-2" style="width: 60px; height: 60px" alt="{{ $a->name }}">
                </div>
                <div class="col-3  ">
                    {{ $a->name }}
                </div>
                <div class="col-2  ">
                    <a href="{{ route('anime.edit', $a->id) }}" class="btn btn-warning">Edit</a>
                </div>
                <div class="col-2  ">
                    <form method="post" onsubmit="return confirmDelete()" action="{{ route('anime.destroy', $a->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
    </div>
        @else
            <p>Access denied.</p>
        @endif
    </div>
@endsection

