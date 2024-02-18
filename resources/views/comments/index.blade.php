@extends('layouts.app')

@section('content')
    <div class="bg-dark container">
    @if(auth()->check() && auth()->user()->id == 2)
        <h2>Comment List</h2>

            @foreach($comments as $comment)
            <div class="row align-items-center ">
            <div class="col-2">
                <img class="rounded-circle shadow-1-strong me-3"
                src="http://127.0.0.1:8000/{{ $comment->user->img }}" alt="avatar" width="60" height="60" />
            </div>
            <div class="col-2">
                <h6 class="fw-bold text-primary mb-1">{{ $comment->user->name }}</h6>
            </div>
            <div class="col-2">
                   {{$comment->created_at->format('Y-m-d H:i')}}
            </div>  
            <div class="col-4">
                <div class="overflow-auto" style="word-wrap: break-word; max-height: 100px;"> 
                {{ $comment->content }}
                </div>
            </div>

            <div class="col-2">
                    <form method="post" onsubmit="return confirmDelete()" action="{{ route('comment.destroy', $comment->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </div>
            </div>
            @endforeach
    @else
            <p>Access denied.</p>
@endif
@endsection
