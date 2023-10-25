@extends('layouts.dashboard')

@section('page-title', 'Show di Teacher')

@section('main-content')
    <div class="container">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img class="ms-img-profile" src="/storage/{{ $teacher->photo }}" alt="{{ $teacher->user->first_name }}">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $teacher->user->first_name }} <span class="opacity-50 fw-medium ">{{ $teacher->user->last_name }}</h2>
                    <h5>Contatti +39 {{ $teacher->phone }}</h5>
                    <p class="card-text">la tua bio: {{ $teacher->bio }}</p>
                    <div class="ms-action-wrapper d-flex gap-3 flex-column flex-md-row">
                        <a class="text-white btn btn-warning mb-3" href="{{ route('user.teachers.edit', ['teacher' => $teacher->id]) }}">Modifica Profilo</a>
                        <form action="{{ route('user.teachers.destroy', ['teacher' => $teacher->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                
                            <button class="btn btn-danger w-100">Elimina Profilo</button>
                        </form>

                    </div>
                </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
