@extends('layouts.dashboard')

@section('page-title', 'Index dei Messaggi')

@section('main-content')
    <h1 class="text-center text-white my-4">Messaggi</h1>
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
                @foreach ($messages as $message)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $message->name ? $message->name : "Anonimo" }}</td>
                    <td colspan="2">{{ $message->content }}</td>
                    <td class="d-flex gap-2">
                      <a class="btn btn-primary" href="{{ route('user.messages.show', ['message' => $message->id]) }}">Visualizza</a>
                      <div class="ms-action-wrapper">
                        <form action="{{ route('user.messages.destroy', ['message' => $message->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100">Elimina</button>
                        </form>
                      </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
