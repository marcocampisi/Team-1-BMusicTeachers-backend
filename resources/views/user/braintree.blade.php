@extends('layouts.layoutdamodificare')

@section('page-title', 'Checkout')

@section('main-content')
    <div class="py-12">
        @csrf
        <h1 class="fs-1 fw-bold text-center text-white">Effettua il pagamento</h1>
        <form action="{{route('user.payment')}}" id="myForm" method="post">
            @method('POST')
            <div id="dropin-wrapper">
                <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
                <div style="display: flex;justify-content: center;align-items: center; color: white">
                    <a id="submit-button" class="btn btn-sm btn-success">Submit payment</a>
                </div>
            </div>
        </form>
        <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.min.js"></script>
        <script>
            const button = document.querySelector('#submit-button');

            braintree.dropin.create({
                    authorization: '{{$token}}',
                    container: '#dropin-container'
                },

                function () {
                    button.addEventListener('click', function () {
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
                    });
                })
        </script>
    </div>
@endsection
