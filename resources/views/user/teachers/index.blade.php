@extends('layouts.app')

@section('page-title', 'Index di Teacher')

@section('main-content')
    <h1 class="text-center text-light text-teachers my-4">Musicisti in Rete</h1>
    <div class="container">
        <div class="row row-gap-3">
            @foreach ($teachers as $teacher)
                <div class="col-12 col-md-4 col-lg-3 ">
                    <div class="card mb-4 h-100 ms-bg-index-card border text-light position-relative text-center overflow-hidden">
                        <img src="/storage/{{ $teacher->photo }}" class="card-img-top img-card" alt="{{ $teacher->user->first_name }}">
                        {{-- <div class="wishlist">&#9733;</div> --}}
                        <div class="wishlist">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                <path fill="black" d="M12 2.3l2.7 7.7h7.6l-6 4.6 2.7 7.7-7-5.3-7 5.3 2.7-7.7-6-4.6h7.6z"/>
                            </svg>
                        </div>                        
                        <div class="card-body d-flex flex-column justify-content-between my-card-slug mt-2">
                            <h5 class="card-title">{{ $teacher->user->first_name }} {{ $teacher->user->last_name }}</h5>
                            <p class="card-text">{{ $teacher->bio }}</p>
                            <div class="justify-content-center align-items-center">
                                <a href="{{ route('user.teachers.show', ['teacher' => $teacher]) }}" class="btn btn-outline-light btn-success mt-3">Show</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
