@extends('layouts.guest')

@section('main-content')
    <div class="form-section">
        <div class="form-box pt-4 pb-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <h1 class="text-center text-light">Register</h1>
                <!-- Firstame -->
                <div class="inputbox">
                    <input class="ms-form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" type="text" id="first_name" first_name="first_name">
                    <label class="form-label" for="first_name">
                        Firstname
                    </label>
                </div>
                @error('first_name')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
                <!-- Lastname -->
                <div class="inputbox">
                    <input class="ms-form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" type="text" id="last_name" last_name="last_name">
                    <label class="form-label" for="last_name">
                        Lastname
                    </label>
                </div>
                @error('last_name')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <!-- Email Address -->
                <div class="mt-4 inputbox">
                    <input class="ms-form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" id="email" name="email">
                    <label class="form-label" for="email">
                        Email
                    </label>
                </div>
                @error('email')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <!-- Password -->
                <div class="mt-4 inputbox">
                    <input class="ms-form-control @error('password') is-invalid @enderror" type="password" id="password" name="password">
                    <label class="form-label" for="password">
                        Password
                    </label>
                </div>
                @error('password')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <!-- Confirm Password -->
                <div class="mt-4 inputbox">
                    <input class="ms-form-control @error('password_confirmation') is-invalid @enderror"  type="password" id="password_confirmation" name="password_confirmation">
                    <label class="form-label" for="password_confirmation">
                        Conferma Password
                    </label>
                </div>
                @error('password_confirmation')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <div class="d-flex flex-column items-center justify-end mt-4">
                    <a href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
        
                    <button type="submit" class="btn btn-primary mt-2">
                    Register
                    </button>
                </div>
            </form>
        </div>
    </div>
    
@endsection