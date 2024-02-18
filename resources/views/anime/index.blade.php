@extends('layouts.app')

@section('content')
<div class=" container">
    <h1>Anime List</h1>
    <div class="row">
        @foreach($anime as $a)
            <div class="col-md-4 mb-4 d-flex justify-content-center">
                <div class="card c-{{$a->id}}" style="max-width: 330px; {{ $a->isWatched() ? 'background-color: black; color: white;' : '' }}">
                    <img src="{{ asset('storage/prev/' . $a->previmg) }}" class="card-img-top" style="max-width: 330px; height: 480px" alt="{{ $a->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $a->name }}</h5>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{ route('anime.show', $a->id) }}" class="btn b-{{$a->id}} btn-{{ $a->isWatched() ? 'secondary' : 'primary' }}">Go Watch</a>
                        <div>

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

                                    if(response.message=="Mark as watched"){
                                        $('.c-{{$a->id}}').css('background-color', 'white');
                                        $('.c-{{$a->id}}').css('color', 'black');
                                    }else{
                                        $('.c-{{$a->id}}').css('background-color', 'black');
                                        $('.c-{{$a->id}}').css('color', 'white');
                                    }
                    

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

                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
