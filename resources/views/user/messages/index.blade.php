@extends('layouts.dashboard')

@section('page-title', 'Index di Messages')

@section('main-content')
    <h1 class="text-center text-warning my-4">Index di Messages</h1>
    <div class="container">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome utente</th>
                <th scope="col" colspan="2" >Contenuto</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $message->name ? $message->name : "Anonimo" }}</td>
                    <td colspan="2">{{ $message->content }}</td>
                    <td><a class="btn btn-primary" href="{{ route('user.messages.show', ['message' => $message->id]) }}">Visualizza</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection