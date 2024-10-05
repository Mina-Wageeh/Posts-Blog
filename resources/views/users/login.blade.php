@extends('layouts.site')

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}
{{--                        --}}
{{--                       --}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}


@section('content')
    <div class="form-container d-flex flex-column justify-content-center align-items-center">
        <form id="client-form" method="post" enctype="multipart/form-data" class="create-form col-4 align-middle">
            @csrf

            <div class="mb-3">
                <h3 class="text-center">Login</h3>
            </div>

            <div class="mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

{{--            <div class="mb-3">--}}
{{--                <label for="photo" class="form-label">Photo</label>--}}
{{--                <input id="photo" class="form-control" name="photo" type="file">--}}
{{--            </div>--}}

            <div class="">
                <button type="submit" class="btn btn-dark col-12">Login</button>
            </div>

        </form>
    </div>
@endsection


@section('style')
    <style>
        .footer-container
        {
            display: none;
        }
        .login-text
        {
            color: yellow!important;
        }
    </style>
@endsection
