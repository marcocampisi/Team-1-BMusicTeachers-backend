@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('main-content')

<h1>funziona</h1>

<label for="timeFrameSelect">Seleziona il periodo:</label>
<select id="timeFrameSelect">
  <option value="month">Mese</option>
  <option value="year">Anno</option>
</select>

<div class="w-50">
  <canvas id="myChart" width="400" height="200"></canvas>
</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

  <script>
    import {Chart} from "chart.js";

    let dataYearly = @json($yearlyAverages);
    let dataMonthly = @json($monthlyAverages);
    let labelsYearly = dataYearly.map(function(item) {
        return item.year;
    });
    let valuesYearly = dataYearly.map(function(item) {
        return item.average;
    });
    let reviewCountsYearly = dataYearly.map(function(item) {
        return item.numRatings;
    });
    let labelsMonthly = dataMonthly.map(function(item) {
        return item.month;
    });
    let valuesMonthly = dataMonthly.map(function(item) {
        return item.average;
    });
    let reviewCountsMonthly = dataMonthly.map(function(item) {
        return item.numRatings;
    });

    let ctx = document.getElementById('myChart').getContext('2d');
  let myChart;

    function updateChart(selectedTimeFrame) {
        if (myChart) {
            myChart.destroy();
        }

        if (selectedTimeFrame === 'month') {
            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelsMonthly,
                    datasets: [{
                        label: 'Media Voti',
                        data: valuesMonthly,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Numero di Recensioni',
                        data: reviewCountsMonthly,
                        backgroundColor: 'rgba(192, 75, 75, 0.2)',
                        borderColor: 'rgba(192, 75, 75, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                        }
                    }
                }
            });
        } else {
            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelsYearly,
                    datasets: [{
                        label: 'Media Voti',
                        data: valuesYearly,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Numero di Recensioni',
                        data: reviewCountsYearly,
                        backgroundColor: 'rgba(192, 75, 75, 0.2)',
                        borderColor: 'rgba(192, 75, 75, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                        }
                    }
                }
            });
        }
    }

    // Aggiungi un listener per gestire la selezione di Mese/Anno
    document.getElementById('timeFrameSelect').addEventListener('change', function() {
        const selectedTimeFrame = this.value;
        updateChart(selectedTimeFrame);
    });

    // Inizializza il grafico con la selezione predefinita su Mese
    updateChart('month');
</script>

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
{{-- script braintree --}}

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
