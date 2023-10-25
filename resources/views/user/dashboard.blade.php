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

<div class="card">
  <div class="card-body">
      <form method="POST" action="">
          <button>
              <a href="{{route('user.checkout', ['sponsorization' => 1])}}">Sponsorizzazione 1</a>
          </button>
      </form>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <form method="POST" action="">
        <button>
            <a href="{{route('user.checkout', ['sponsorization' => 2])}}">Sponsorizzazione 2</a>
        </button>
      </form>
  </div>
</div>

<div class="card">
  <div class="card-body">
      <form method="POST" action="">
          <button>
              <a href="{{route('user.checkout', ['sponsorization' => 3])}}">Sponsorizzazione 3</a>
          </button>
      </form>
  </div>
</div>

@endsection
