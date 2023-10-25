@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')

<h1>funziona... non credo</h1>
{{-- 
    <div style="background:#fff; width:800px; height:600px">
        <canvas id="myChart" ></canvas>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    import {Chart} from "chart.js";

    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['gennaio', 'febbraio', 'marzo', 'ecc'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script> --}}

<h2>SPONSORIZZAZIONI MAGICHE</h2>
{{-- Braintree --}}
<div>
  <div id="dropin-wrapper">
      <div id="checkout-message">
          Qui ci sarà il resoconto
      </div>
      {{-- 🔪🔪🔪 Se ti prendo Taylor Otwell...  --}}
      <div id="dropin-container"></div>
      {{-- <button id="submit-button">Submit payment</button> --}}
  </div>
</div>
{{-- scrypt braintree --}}
<script>
let paymentValidated = false;

const input = document.querySelector('#dropin-wrapper');

braintree.dropin.create({
// Inserisci la tua chiave di autorizzazione qui
authorization: 'sandbox_s93sbd2q_2jc4smw4xvmkzsp6',
  container: '#dropin-container'
}, 

  function (createErr, instance) {
  input.addEventListener('mouseleave', function () {
  instance.requestPaymentMethod((requestPaymentMethodErr, payload) => {
          if (requestPaymentMethodErr) {
          console.error(requestPaymentMethodErr);
          } 
          else {
          paymentValidated = true;
          console.log(paymentValidated);
          document.getElementById("myForm").requestSubmit();
          // window.location.href = 'http://127.0.0.1:8000/admin/dashboard'
          }
      });
  });
})
</script>

<div class="card">
  <div class="card-body">
      <form method="POST" action="">
          <button>Sponsorizzazione 1</button>
      </form>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <form method="POST" action="">
          <button>Sponsorizzazione 2</button>
      </form>
  </div>
</div>

<div class="card">
  <div class="card-body">
      <form method="POST" action="<?php echo Braintree_TransparentRedirect::url(); ?>">
          <button>Sponsorizzazione 3</button>
      </form>
  </div>
</div>

@endsection
