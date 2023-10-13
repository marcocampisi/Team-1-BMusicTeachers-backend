@extends('layouts.app')

@section('page-title', 'Create Message')

@section('main-content')
    
    <form action="{{ route('admin.messages.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <h1 class="text-white">Crea messaggio</h1>
        </div>
        
        <div class="mb-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="Il tuo nome (opzionale)">
        </div>

        <div>
            <textarea class="form-control mb-3" name="content" id="content" rows="3" placeholder="Inserisci il testo del messaggio:" required></textarea>
        </div>

        <button class="btn btn-primary mb-3" type="submit">
            Invia
        </button>

        <select class="form-select w-25" name="teacher_ids" id="teacher_ids">
            @foreach ($teachers as $teacher)
                <option value="teacher_id">{{ $teacher->id }}</option>
            @endforeach
        </select>
    </form>

@endsection