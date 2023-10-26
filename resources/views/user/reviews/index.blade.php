@extends('layouts.dashboard')

@section('page-title', 'Index delle Recensioni')

@section('main-content')
    <h1 class="text-center text-warning my-4">Recensioni</h1>
    <div class="container">
        <table class="table table-bordered table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome utente</th>
                <th scope="col" colspan="2" >Contenuto</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $review->name ? $review->name : "Anonimo" }}</td>
                    <td colspan="2">{{ $review->content }}</td>
                    <td>
                      <a class="btn btn-primary" href="{{ route('user.reviews.show', ['review' => $review->id]) }}">Visualizza</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
