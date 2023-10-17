@extends('layouts.app')

@section('page-title', 'Index di Sponsorization')

@section('main-content')
    <h1 class="text-center text-warning my-4">Index di Sponsorization</h1>
    <div class="row">
        @foreach ($sponsorization->all() as $sponsorization)
            <div class="col-12 col-sm-3">
                <div class="card mb-4">
                    <!--<img src="https://picsum.photos/1000" class="card-img-top" alt="...">-->
                    <div class="card-body my-card-slug">
                        <h5 class="card-title">{{ $sponsorization->name }}</h5> <!--Chi avrebbe mai detto che qua sarebbe servito lo slug?-->
                        <a href="" class="btn btn-primary">Questo Link porterà alla rotta per il pagamento!!!</a>
                        <h5 class="card-title">€{{ $sponsorization->price}}</h5>
                        <h5 class="card-title">{{ $sponsorization->duration}} ORE</h5> <!--da rivedere se modificare il formato delle ore in pagina-->
                        <!--Incoming porcate-->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection