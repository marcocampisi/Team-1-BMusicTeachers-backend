@extends('layouts.guest')

@section('page-title', 'Crea Insegnante')

@section('main-content')
    <div class="form-section">
        <div class="form-box pt-4 pb-3 text-light">
            <form action="{{ route('user.teachers.store', ['user_id' =>auth()->user()->id ])}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <h2 class="text-center">Registrazione</h2>

                <div class="ms-progress bg-secondary mt-4 mb-3">
                    <div class="ms-progress-bar w-100 bg-success"></div>
                    <div class="ms-display-1 fw-bold text-success">1/2</div>
                    <div class="ms-point bg-success"></div>
                    <div class="ms-display-2 fw-bold text-success">2/2</div>
                    <div class="ms-point end bg-success"></div>
                </div>

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
                    <label for="formFileMultiple" class="form-label">Foto</label>
                    <input class="form-control" type="file" name="photo" id="formFileMultiple" accept="image/*">
                </div>
                @error('photo')
                <div class="alert alert-danger my-2">
                    {{ $message }}
                </div>
                @enderror

                <div class="inputbox">
                    <div>
                        <input type="tel" pattern="[0-9]{5-20}" name="phone" min="0"
                               placeholder="Inserisci il tuo numero di telefono:" required value="{{old('phone')}}">
                    </div>
                </div>
                @error('phone')
                <div class="alert alert-danger my-2">
                    {{ $message }}
                </div>
                @enderror

                <div class="mb-3">
                    @foreach ($subjects as $subject)
                        <input
                            type="checkbox"
                            class="btn-check"
                            name="subjects[]"
                            value="{{ $subject->id }}"
                            id="subject-{{ $subject->id }}"
                            @if (
                              in_array( $subject->id ,
                              old('subject', [])
                              )
                            )
                                checked
                            @endif
                        >

                        <label class="btn btn-outline-light mt-2"
                               for="subject-{{ $subject->id }}">{{ $subject->name }}</label>
                    @endforeach
                </div>
                @error('subjects')
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
                    <label for="bio" class="form-label">Qualcosa su di me:</label>
                    <textarea class="form-control bg-transparent text-light ms-textarea" name="bio" id="bio" rows="3"
                              required>{{old('bio')}}</textarea>
                </div>

                <div class="d-flex">
                    <button type="submit" class="btn btn-light mx-auto px-4">
                        Crea
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
