@extends('layouts.dashboard')

@section('page-title', 'Show')

@section('main-content')

<div class="container">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <h5 class="card-title">{{ $review->name ?  $review->name : 'Anonimo'}}</h5>
            <p class="card-text">{{ $review->content}}</p>
            <a href="" class="btn btn-danger">Elimina</a>
        </div>
    </div>
</div>

@endsection
