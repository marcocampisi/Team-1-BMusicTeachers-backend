@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
<section>
    <div class="form-box">
        <div class="form-value">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h2>Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="email" id="email" class="ms-form-control fs-5 text-light @error('email') is-invalid @enderror" name="email"  required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <label for="password">Password<span class="text-danger">*</span></label>
                    <input type="password" id="password" class="ms-form-control fs-5 text-light ms-input @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror                  
                </div>
                <div class="mb-1 text-light">
                    <p class="fs-1 fw-light fs-3">I campi contrassegnati <span class="text-danger">*</span> sono obbligatori.</p>
                </div>

                <div class="forget">
                    <label for="remember">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember"> Ricordami
                    </label>
                    <label>
                        <a href="#">Forgot Password?</a>
                    </label>
                </div>    
                <button type="submit">Login</button>
                <div class="register">
                    <p>Don't have a account ? <a href="#">Register</a></p>
                </div>

                </div>
            </form>
        </div>
    </div>
</section>
@endsection
