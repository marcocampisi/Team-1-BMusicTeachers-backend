@extends('layouts.app')

@section('page-title', 'Show di Subject')

@section('main-content')
    <h1 class="text-white">{{ $subject->name }}</h1>
    <div class="row">
        <div class="col bg-light">
            <h2>
                Insegnanti 
            </h2>

            <ul>
                
                @foreach ($subject->teachers as $teacher)
                
                    <li>
                        <a href="{{ route('user.teachers.show', ['teacher' => $teacher->id]) }}">
                            {{ $teacher->user->first_name }}
                            {{ $teacher->user->last_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <button class="btn btn-danger">SLUG</button>
@endsection