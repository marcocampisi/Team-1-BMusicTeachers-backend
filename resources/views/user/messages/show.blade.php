@extends('layouts.dashboard')

@section('page-title', 'Show')

@section('main-content')

<div class="container">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <h5 class="card-title">{{ $message->name ?  $message->name : 'Anonimo'}}</h5>
            <p class="card-text">{{ $message->content}}</p>
            <div class="ms-action-wrapper">
                <form action="{{ route('user.messages.destroy', ['message' => $message->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger w-100">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
