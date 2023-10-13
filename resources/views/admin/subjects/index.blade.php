@extends('layouts.app')

@section('page-title', 'Index di Subject')

@section('main-content')
    <h1 class="text-center text-warning my-4">Index di Subject</h1>
    <div class="row">
        @foreach ($subjects->all() as $subject)
            <div class="col-12 col-sm-3">
                <div class="card mb-4">
                    <!--<img src="https://picsum.photos/1000" class="card-img-top" alt="...">-->
                    <div class="card-body my-card-slug">
                        <h5 class="card-title">{{ $subject->name }}</h5>
                        <a href="{{ route('admin.subjects.show', ['subject' => $subject]) }}" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection