@extends('layouts.app')

@section('page-title', 'Show di Teacher')

@section('main-content')
    <div class="container">
        <h1 class="text-white fw-bold">{{ $teacher->user->first_name }} <span class="text-secondary fw-medium ">{{ $teacher->user->last_name }}</span></h1>
        <p class="text-white">{{ $teacher->bio }}</p>
        <p class="text-white">+39 {{ $teacher->phone }}</p>
        <button class="btn btn-warning col-1 me-2">
            <a class="text-white" href="{{ route('admin.teachers.edit', ['teacher' => $teacher->id]) }}">Modifica</a>
        </button>
        <button class="btn btn-danger col-1">
            <a class="text-white" href="{{ route('admin.teachers.destroy', ['teacher' => $teacher->id]) }}">Elimina</a>
        </button>
    </div>
@endsection
