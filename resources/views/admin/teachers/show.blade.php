@extends('layouts.app')

@section('page-title', 'Show di Teacher')

@section('main-content')
    <h1 class="text-white">{{ $teacher->user->first_name }}</h1>
    <p class="text-white">{{ $teacher->bio }}</p>
    <p class="text-white">+39 {{ $teacher->phone }}</p>
    <button class="btn btn-danger">SLUG</button>
@endsection