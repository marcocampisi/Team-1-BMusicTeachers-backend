@extends('layouts.dashboard')

@section('page-title', 'Show')

@section('main-content')

<div class="container">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <h5 class="card-title">{{ $review->name ?  $review->name : 'Anonimo'}}</h5>
            <p class="card-text">{{ $review->content}}</p>
            <div class="ms-action-wrapper">
                <form action="{{ route('user.reviews.destroy', ['review' => $review->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger w-100">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
