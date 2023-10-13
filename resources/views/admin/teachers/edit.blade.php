@extends('layouts.app');

@section('page-title', 'Create Teacher')

@section('main-content')
    
    <form action="{{ route('admin.teachers.update', ['teacher' => $teacher])}}" method="POST">
        @csrf
        @method('PUT')
        
        
        <div class="mb-3">
            <label for="bio" class="form-label">About me:</label>
            <textarea class="form-control" name="bio" id="bio" rows="3" required></textarea>
          </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" name="cv" id="formFile">
        </div>

        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
            <input class="form-control" type="file" name="photo" id="formFileMultiple" multiple>
        </div>

        <div>
            <input type="number" name="phone" placeholder="Inserisci il tuo numero di telefono:" required value="{{old('phone')}}">
        </div>

        <select class="form-select" name="service" aria-label="Default select example">
            <option selected>Service</option>
            @foreach ($services as $service)
                <option value="{{$service}}">{{$service}}</option>
            @endforeach
        </select>
            <button type="submit">
                Crea
            </button>
    </form>
@endsection