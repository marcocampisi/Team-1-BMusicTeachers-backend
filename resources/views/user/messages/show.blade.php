@extends('layouts.app');

@section('page-title', 'Show')

@section('main-content')

<div class="card">
    <div class="card-body">
        <h2>{{ $message->name ? $message->name : "Anonimo" }}</h1>
        <p>{{ $message->content}}</p>
    </div>
    <div class="card-footer">
        <a href="" class="btn btn-danger">Elimina</a>
    </div>
</div>

@endsection