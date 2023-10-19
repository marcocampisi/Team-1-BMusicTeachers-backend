@extends('layouts.app')

@section('page-title', 'Index di Messages')

@section('main-content')
    <h1 class="text-center text-warning my-4">Index di Messages</h1>
    <div class="row">
        @foreach ($messages->all() as $message)
            <div class="col-12 col-sm-3">
                <div class="card mb-4">
                    <div class="card-body my-card-slug">
                        <h5 class="card-title">{{ $message->name ? $message->name : "Anonimo" }}</h5>
                        <p class="card-text">{{ $message->content }}</p>
                        <a class="btn btn-primary" href="{{ route('user.messages.show', ['message' => $message]) }}">Visualizza</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection