@extends('layouts.app')

@section('page-title', 'Show di Teacher')

@section('main-content')
    <div class="container">
        <h1 class="text-white fw-bold">{{ $teacher->user->first_name }} <span class="opacity-50 fw-medium ">{{ $teacher->user->last_name }}</span></h1>
        <p class="text-white">{{ $teacher->bio }}</p>
        <p class="text-white">+39 {{ $teacher->phone }}</p>
        <button class="btn btn-warning col-2 mb-3">
            <a class="text-white" href="{{ route('user.teachers.edit', ['teacher' => $teacher->id]) }}">Modifica</a>
        </button>
        <form action="{{ route('user.teachers.destroy', ['teacher' => $teacher->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger col-2">Elimina</button>
        </form>
    </div>
@endsection
