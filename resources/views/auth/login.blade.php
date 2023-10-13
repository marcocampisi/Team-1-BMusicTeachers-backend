@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
<div class="container">

    <div class="row justify-content-center align-items-center ms-login-card">
        <div class="col-md-8">

            <div class="card">
                <div class="text-light fs-1 text-center">Login</div>

                <div class="card-body">

                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <div class="mb-2 text-light">
                            <label for="email" class="form-label fs-4">
                                E-mail <span class="text-danger">*</span>
                            </label>

                            <input type="email" id="email" class="ms-form-control fs-5 text-light @error('email') is-invalid @enderror" name="email"  required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2 text-light">
                            <label for="password" class="form-label fs-4">Password <span class="text-danger">*</span></label>
                            <input type="password" id="password" class="ms-form-control fs-5 text-light ms-input @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 text-light">
                            <p class="fs-6 fw-light fs-5">I campi contrassegnati <span class="text-danger">*</span> sono obbligatori.</p>
                        </div>

                        <div class="mb-3 text-light">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ricordami</label>
                                
                            </div>
                        </div>


                        <button type="submit" class="btn btn-outline-primary">Login</button>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
