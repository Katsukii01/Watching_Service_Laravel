@extends('layouts.app')
@section('content')
<div class="container bg-dark" >
    <h1>watched Anime List</h1>
    <div class="row">
        @foreach($anime as $a)
        @if($a->isWatched())
        <div class="row align-items-center ">
        <div class="col-2">
            <img src="{{ asset('storage/prev/' . $a->previmg) }}" class="img-fluid rounded-circle mb-2" style="width: 60px; height: 60px" alt="{{ $a->name }}">
        </div>
        <div class="col-3  ">
            <h5 class="card-title">{{ $a->name }}</h5>
        </div>
        <div class="col-2">
                        @if (auth()->check())
                        @php
                            $watchedClass = $a->isWatched() ? 'btn-danger' : 'btn-success';
                            $actionRoute = $a->isWatched() ? 'anime.unmarkAsWatched' : 'anime.markAsWatched';
                        @endphp
                        <button 
                            type="button" 
                            class="btn {{ $watchedClass }} toggle-watch-status-{{$a->id}}" 
                            data-action="{{ route($actionRoute, $a->id) }}">
                            {{$a->isWatched() ? 'Unmark as watched' : 'Mark as watched' }}
                        </button>
                        @endif
        </div>
        </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                    $(document).ready(function () {
                        $('.toggle-watch-status-{{$a->id}}').on('click', function (event) {
                            event.preventDefault();

                            var button = $(this);
                            var action = button.hasClass('btn-success') ? '/anime/{{$a->id}}/markAsWatched' : '/anime/{{$a->id}}/unmarkAsWatched';
                            var csrfToken = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                type: 'POST',
                                url: action,
                                dataType: 'json',
                                data: {
                                    _token: csrfToken,
                                },
                                success: function (response) {
                                    $('.b-{{$a->id}}').toggleClass('btn-primary btn-secondary');
                                    
                                    // Toggle button color
                                    button.toggleClass('btn-success btn-danger');
                                    
                                    // Toggle button text
                                    button.text(response.message);
                                },
                                error: function (xhr, textStatus, errorThrown) {
                                    console.error("AJAX Error:");
                                    console.error("Status: " + textStatus);
                                    console.error("Error: " + errorThrown);
                                    console.error("Response: " + xhr.responseText);
                                }
                            });
                        });
                    });
                </script>
            @endif
        @endforeach
    </div>
</div>
@endsection
