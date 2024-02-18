@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img class="img-fluid rounded-circle mb-2" src="{{ url(Auth::user()->img) }}" style="width: 120px; height: 120px">
                    <p class="h1">
                                        {{ Auth::user()->name }}
                    </p>
                    <hr>
                    <a class="nav-link h2"  href="/watched">
                        Watched list
                    </a>
                    <hr>
                    <a class="nav-link h2"  href="/pfpchange">
                        Change profile picture
                    </a>
                    <a class="nav-link h2"  href="/namechange">
                        Change name 
                    </a>
                    <a class="nav-link h2"  href="/passchange">
                        Change password
                    </a>
                    <hr>
                    <a style="color:red" class="nav-link h2"  href="/deleteaccount">
                        Delete account
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
