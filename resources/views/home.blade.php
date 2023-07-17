@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <ul class="navbar-nav flex-row flex-wrap">
                        {{-- <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li> --}}
                        <li class="nav-item col-2 col-md-auto"><a href="{{ route('visitors.index') }}" class="nav-link">Visitor List</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
