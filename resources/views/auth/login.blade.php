@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
<section class="form-section">
    <div class="form-box pt-4 pb-3">
        <form action="{{ route('login') }}" method="post">
            @csrf

            <h2 class="text-center text-white">Login</h2>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>

                <input type="email" id="email" class="text-light @error('email') is-invalid @enderror" name="email"  required required autocomplete="off">
                <label for="email">

                    Email
                    <span class="text-danger">*</span>
                </label>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>

                <input type="password" id="password" class="ms-form-control fs-5 text-light ms-input @error('password') is-invalid @enderror" name="password" required required autocomplete="off">
                <label for="password">Password<span class="text-danger">*</span></label>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror

            </div>
            <div class="mb-1 text-light">
                <p class="fw-light ms-small-text">I campi contrassegnati <span class="text-danger">*</span> sono obbligatori.</p>
            </div>

            <div class="forget">
                <label for="remember">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember"> Ricordami
                </label>
                <label>
                    <a href="#">Password Dimenticata?</a>
                </label>
            </div>
            <button class="btn-log" type="submit">Login</button>
            <div class="register">
                <p>Non hai un aaccount?  <a class="mt-2" href="{{ route('register') }}">Registrati</a></p>
            </div>
        </form>
    </div>
</section>
@endsection
