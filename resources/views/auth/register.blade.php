@extends('layouts.guest')

@section('main-content')
    <div class="form-section">
        <div class="form-box pt-4 pb-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <h2 class="text-white text-center">Registrati</h2>
                <div class="ms-progress bg-secondary mt-4">
                    <div class="ms-progress-bar w-50 bg-success"></div>
                    <div class="ms-display-1 fw-bold text-success">1/2</div>
                    <div class="ms-point bg-success"></div>
                    <div class="ms-display-2 fw-bold text-secondary">2/2</div>
                    <div class="ms-point end bg-secondary"></div>
                </div>
                <!-- Firstame -->
                <div class="inputbox">
                    <ion-icon name="person-outline"></ion-icon>
                    <input class="ms-form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" type="text" id="first_name" name="first_name" required autocomplete="off">
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
                    <ion-icon name="person-outline"></ion-icon>
                    <input class="ms-form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" type="text" id="last_name" name="last_name" required autocomplete="off">
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
                    <ion-icon name="mail-outline"></ion-icon>
                    <input class="ms-form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" id="email" name="email" required autocomplete="off">
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
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input class="ms-form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" required autocomplete="off">
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
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input class="ms-form-control @error('password_confirmation') is-invalid @enderror"  type="password" id="password_confirmation" name="password_confirmation" required autocomplete="off">
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
                            <a href="#">Password dimenticata?</a>
                        </label>
                    </div>

                    <button type="submit" class="btn-log mt-3">
                    Registrati
                    </button>
                    <a class="text-center mt-3" href="{{ route('login') }}">
                        {{ __('Già registrato?') }}
                    </a>
                </div>
            </form>

        </div>
    </div>

@endsection
