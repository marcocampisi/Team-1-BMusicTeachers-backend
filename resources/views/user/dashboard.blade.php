@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('main-content')

<h2>Sponsorizzazioni</h2>
{{--Braintree--}}
<div>
  <div id="dropin-wrapper">
      <div id="checkout-message">
          Qui ci sarà il resoconto
      </div>
      {{-- 🔪🔪🔪 Se ti prendo Taylor Otwell...  --}}
      <div id="dropin-container"></div>
  </div>
</div>

<div class="row">
    <div class="col-4 text-center">
        <div class="card">
            <div class="card-body">
                <a href="{{route('user.checkout', ['sponsorization' => 1])}}" class="text-black">Sponsorizzazione 1</a>
            </div>
        </div>
    </div>
    <div class="col-4 text-center">
        <div class="card">
            <div class="card-body">
                <a href="{{route('user.checkout', ['sponsorization' => 2])}}" class="text-black">Sponsorizzazione 2</a>
            </div>
        </div>
    </div>
    <div class="col-4 text-center">
        <div class="card">
            <div class="card-body">
                <a href="{{route('user.checkout', ['sponsorization' => 3])}}" class="text-black">Sponsorizzazione 3</a>
            </div>
        </div>
    </div>
</div>

<h3 class="mt-3 text-light">Grafici</h3>
<label for="timeFrameSelect" class="text-light">Seleziona il periodo:</label>
<select id="timeFrameSelect">
  <option value="month">Mese</option>
  <option value="year">Anno</option>
</select>

<div class="w-50">
  <canvas id="myChart" width="400" height="200"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
   let data = @json($monthlyAverages);
    let labels = data.map(function(item) {
        return item.month;
    });
    let values = data.map(function(item) {
        return item.average;
    });
    let reviewCounts = data.map(function(item) {
        return item.numRatings;
    });

    let ctx = document.getElementById('myChart').getContext('2d');
    let myChart;

    function updateChart(selectedTimeFrame) {
        let filteredData;

        if (selectedTimeFrame === 'month') {
            filteredData = data;
        } else {
            filteredData = @json($yearlyAverages);
        }

        labels = filteredData.map(function(item) {
            return selectedTimeFrame === 'month' ? item.month : item.year;
        });
        values = filteredData.map(function(item) {
            return item.average;
        });
        reviewCounts = filteredData.map(function(item) {
            return item.numRatings;
        });

        if (myChart) {
            myChart.destroy();
        }

        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Media Voti',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }, {
                    label: 'Numero di Recensioni',
                    data: reviewCounts,
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

    document.getElementById('timeFrameSelect').addEventListener('change', function() {
        const selectedTimeFrame = this.value;
        updateChart(selectedTimeFrame);
    });

    updateChart('month');
</script>
@endsection
