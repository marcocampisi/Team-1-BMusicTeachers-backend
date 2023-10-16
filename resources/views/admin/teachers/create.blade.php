@extends('layouts.guest')

@section('page-title', 'Create Teacher')

@section('main-content')
    <div class="form-section"> 
        <div class="form-box pt-4 pb-3 text-light">
            <form action="{{ route('admin.teachers.store', ['user_id' =>auth()->user()->id ])}}" method="POST">
                @csrf
                <h2>Register</h2>
                
                
        
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" name="cv" id="formFile">
                </div>
                @error('cv')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                    <input class="form-control" type="file" name="photo" id="formFileMultiple" multiple>
                </div>
                @error('photo')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <div class="inputbox">
                    <div>
                        <input type="number" name="phone" min="0" placeholder="Inserisci il tuo numero di telefono:" required value="{{old('phone')}}">
                    </div>
                </div>
                @error('phone')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <div class="mb-3">
                    <select class="form-select" name="service">
                        <option selected>Service</option>
                        @foreach ($services as $service)
                            <option value="{{$service}}">{{$service}}</option>
                        @endforeach
                    </select>
                </div>
               
                @error('service')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="bio" class="form-label">About me:</label>
                    <textarea class="form-control bg-transparent text-light ms-textarea" name="bio" id="bio" rows="3" required></textarea>
                </div>

                    <button type="submit">
                        Crea
                    </button>
            </form>
        </div>
    </div>
@endsection