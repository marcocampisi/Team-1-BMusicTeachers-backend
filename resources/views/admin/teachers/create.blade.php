@extends('layouts.guest')

@section('page-title', 'Create Teacher')

@section('main-content')
    {{-- <div class="form-section">
        <div class="form-box pt-4 pb-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <h2>Register</h2>
                <!-- Firstame -->
                <div class="inputbox">
                    <input class="ms-form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" type="text" id="first_name" name="first_name">
                    <label class="form-label" for="first_name">
                        Firstname<span class="text-danger">*</span>
                    </label>
                </div>
                @error('first_name')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
                <!-- Lastname -->
                <div class="inputbox">
                    <input class="ms-form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" type="text" id="last_name" name="last_name">
                    <label class="form-label" for="last_name">
                        Lastname<span class="text-danger">*</span>
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
                        Email<span class="text-danger">*</span>
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
                        Password<span class="text-danger">*</span>
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
                        Conferma Password<span class="text-danger">*</span>
                    </label>
                </div>
                @error('password_confirmation')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-1 text-light">
                    <p class="fw-light ms-small-text">I campi contrassegnati <span class="text-danger">*</span> sono obbligatori.</p>
                </div>
        
                <div class="d-flex flex-column items-center justify-end mt-4">
                    

                    <div class="forget">
                        <label for="remember">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember"> Ricordami
                        </label>
                        <label>
                            <a href="#">Forgot Password?</a>
                        </label>
                    </div>    
        
                    <button type="submit" class="mt-3">
                    Register
                    </button>
                    <a class="text-center mt-3" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>

        </div>
    </div> --}}

    <form action="{{ route('admin.teachers.store', ['user_id' =>auth()->user()->id ])}}" method="POST">

        @csrf
        
        
        <div class="mb-3">
            <label for="bio" class="form-label">About me:</label>
            <textarea class="form-control" name="bio" id="bio" rows="3" required></textarea>
          </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" name="cv" id="formFile">
        </div>

        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
            <input class="form-control" type="file" name="photo" id="formFileMultiple" multiple>
        </div>

        <div>
            <input type="number" name="phone" placeholder="Inserisci il tuo numero di telefono:" required value="{{old('phone')}}">
        </div>

        <select class="form-select" name="service" aria-label="Default select example">
            <option selected>Service</option>
            @foreach ($services as $service)
                <option value="{{$service}}">{{$service}}</option>
            @endforeach
        </select>
            <button type="submit">
                Crea
            </button>
    </form>
@endsection