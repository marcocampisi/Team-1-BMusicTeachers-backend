@extends('layouts.guest')

@section('page-title', 'Create Teacher')

@section('main-content')
    <div class="form-section"> 
        <div class="form-box pt-4 pb-3 text-light">
            <form action="{{ route('admin.teachers.store', ['user_id' =>auth()->user()->id ])}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <h2>Register</h2>
                
                
        
                <div class="mb-3">
                    <label for="formFile" class="form-label">Curriculum</label>
                    <input class="form-control" type="file" name="cv" id="formFile">
                </div>
                @error('cv')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Photo</label>
                    <input class="form-control" type="file" name="photo" id="formFileMultiple" accept="image/*">
                </div>
                @error('photo')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <div class="inputbox">
                    <div>
                        <input type="tel" pattern="[0-9]{10}" name="phone" min="0" placeholder="Inserisci il tuo numero di telefono:" required value="{{old('phone')}}">
                    </div>
                </div>
                @error('phone')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <div class="mb-3">
                    <select class="form-select" name="service">
                        @foreach ($services as $service)
                            <option  
                                value="{{$service}}"
                                {{ old('service') ==  $service ? 'selected':'' }}   
                            >
                                {{$service}}
                            </option>
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
                    <textarea class="form-control bg-transparent text-light ms-textarea" name="bio" id="bio" rows="3" required>{{old('bio')}}</textarea>
                </div>

                    <button type="submit">
                        Crea
                    </button>
            </form>

        </div>
    </div> 

@endsection