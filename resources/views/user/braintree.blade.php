@extends('layouts.app')

@section('page-title', 'Checkout')

@section('main-content')
    <div class="py-12">
        @csrf
        <h1 class="fs-1 fw-bold text-center text-white">Effettua il pagamento</h1>
        <div class="row flex-column justify-content-center">
            <div class="col-6 mx-auto">
                <form action="{{route('user.payment')}}" id="myForm" method="post">
                    @method('POST')
                    <div id="dropin-wrapper">
                        <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
                        <div class="card col mx-auto mt-3">
                            <div class="card-header">
                                <h4 class="card-title">Riepilogo</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="fs-5">
                                        <span class="fw-bold">Durata del piano: </span>{{request('name')}}
                                    </li>
                                    <li class="fs-5">
                                        <span class="fw-bold">Prezzo: </span>{{request('price')}} €
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div style="display: flex;justify-content: center;align-items: center; color: white">
                            <a id="submit-button" class="btn btn-sm btn-success p-2 fw-bold my-3">Vai al pagamento</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.min.js"></script>
        <script>
            const button = document.querySelector('#submit-button');
            const input = document.querySelector('#dropin-wrapper');

            braintree.dropin.create({
                    authorization: '{{$token}}',
                    container: '#dropin-container'
                },

                function (createErr, instance) {
                    let paymentValidated = false;

                    button.addEventListener('click', function () {
                        if (!paymentValidated) {
                            instance.requestPaymentMethod((requestPaymentMethod) => {
                                if (requestPaymentMethod) {
                                    console.error(requestPaymentMethod);
                                } else {
                                    paymentValidated = true;
                                }
                            });
                        }

                        if (paymentValidated) {
                            axios.post('{{ route('user.payment') }}', {
                                "token": "fake-valid-nonce",
                                "sponsorization": "{{ request('sponsorization') }}",
                                "teacher_id": "{{ auth()->user()->teacher_id }}"
                            })
                                .then(function () {
                                    console.log('Transazione eseguita');
                                    alert('Pagamento effettuato, grazie!');
                                    window.location.href = 'http://localhost:8000/user/dashboard';
                                })
                                .catch(function (error) {
                                    console.log('Transazione fallita');
                                    alert('Pagamento non effettuato, ripova')
                                    console.error(error);
                                });
                        }
                    });
                })
        </script>
    </div>
@endsection
