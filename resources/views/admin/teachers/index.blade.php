@extends('layouts.app')

@section('page-title', 'Index di Teacher')

@section('main-content')
    <h1 class="text-center text-warning my-4">Index di Teacher</h1>
    <div class="row">
        @foreach ($teachers->all() as $teacher)
            <div class="col-12 col-sm-3">
                <div class="card mb-4">
                    <img src="https://picsum.photos/1000" class="card-img-top" alt="...">
                    <div class="card-body my-card-slug">
                        <h5 class="card-title">{{ $teacher->user->first_name }}</h5>
                        <p class="card-text">{{ $teacher->bio }}</p>
                        <a href="{{ route('admin.teachers.show', ['teacher' => $teacher]) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('admin.teachers.edit', ['teacher' => $teacher]) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
