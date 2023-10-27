@extends('layouts.app')

@section('page-title', 'Create Teacher')

@section('main-content')

<div class="form-section">
    <div class="form-box pt-4 pb-3 text-light">
        <form action="{{ route('user.teachers.update', ['teacher' => $teacher->id])}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <h2 class="text-white text-center">Modifica il profilo</h2>
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
                    <input type="tel" pattern="[0-9]{5-20}" name="phone" min="0" placeholder="Inserisci il tuo numero di telefono:" required value="{{old('phone', $teacher->phone)}}">
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
                id="subject-{{ $subject->id }}"
                @if ($errors->any())
                  @if(
                    in_array(
                      $subject->id,
                      old('subjects', [])
                    )
                  )
                    checked
                  @endif

                @elseif (
                  $teacher->subjects->contains($subject)
                )
                  checked
                @endif
                value="{{ $subject->id }}"
              >

              <label class="btn btn-outline-light mt-2" for="subject-{{ $subject->id }}">{{ $subject->name }}</label>
                @endforeach
            </div>

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
                <textarea class="form-control bg-transparent text-light ms-textarea" name="bio" id="bio" rows="3" required>{{ old('bio', $teacher->bio) }}</textarea>
            </div>

                <button type="submit" class="btn btn-light mx-auto px-4">
                    Crea
                </button>
        </form>
    </div>
</div>
@endsection
