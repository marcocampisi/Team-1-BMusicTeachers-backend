@extends('layouts.app')

@section('page-title', 'Index di Teacher')

@section('main-content')
    <h1>Index di Teacher</h1>
    <div class="row">
        @foreach ($teachers->all() as $teacher)
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $teacher->user->first_name }}</h5>
                        <p class="card-text">{{ $teacher->bio }}</p>
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
