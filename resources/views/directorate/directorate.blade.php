@extends('layouts.appdirectorate')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <form class="card">
                <div class="card-body text-center">
                    <h1 class="mt-3">This is Directorate's Home Page.</h1>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p class="text-muted">
                        {{ __('You are logged out! If you want to login, click the Login button above.') }}
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('build/css/homeresponsible.css') }}">
@endsection