@extends('layouts.app')

@section('page-title', 'Index di Teacher')

@section('main-content')
    <h1 class="text-center text-light text-teachers my-4">Musicisti in Rete</h1>
    <div class="container">
        <div class="row row-gap-3">
            @foreach ($teachers as $teacher)
                <div class="col-12 col-md-4 col-lg-3 ">
                    <div class="card mb-4 h-100 ms-bg-index-card border text-light position-relative text-center">
                        <img src="/storage/{{ $teacher->photo }}" class="card-img-top" alt="{{ $teacher->user->first_name }}">
                        <div class="wishlist bg-success">&hearts;</div>
                        <div class="card-body my-card-slug">
                            <h5 class="card-title">{{ $teacher->user->first_name }} {{ $teacher->user->last_name }}</h5>
                            <p class="card-text">{{ $teacher->bio }}</p>
                            <a href="{{ route('admin.teachers.show', ['teacher' => $teacher]) }}" class="btn btn-outline-light btn-success css-button">Show</a>
                            {{-- <a href="{{ route('admin.teachers.edit', ['teacher' => $teacher]) }}" class="btn btn-warning">Edit</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
