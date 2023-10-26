@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('main-content')

<h2 class="my-4">Sponsorizzazioni</h2>
<p class="text-white text-center">I profili sponsorizzati appariranno in evidenza nella vetrina.</p>
<div class="row d-flex w-full justify-content-center flex-wrap mx-3">
    <div class="col-12 col-md-2 mb-2 text-center">
        <div class="card bg-dark text-white">
            <div class="card-header">
                <h5>Starter</h5>
                <p class="d-flex align-items-center justify-content-center"><span class="fs-2 me-1">€</span>2.99</p>
            </div>
            <div class="card-body">
                <p>Visibilità: 1 Giorno</p>
                <a href="{{route('user.checkout', ['sponsorization' => 1])}}" class="btn btn-light">Vai all'acquisto</a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-2 mb-2 text-center">
        <div class="card bg-dark text-white">
            <div class="card-header">
                <h2>3 Giorni</h2>
            </div>
            <div class="card-body">
                <p><span class="fw-bold">Prezzo:</span> 5.99€</p>
                <a href="{{route('user.checkout', ['sponsorization' => 2])}}" class="btn btn-light">Vai all'acquisto</a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-2 mb-2 text-center">
        <div class="card bg-dark text-white">
            <div class="card-header">
                <h2>1 Settimana</h2>
            </div>
            <div class="card-body">
                <p><span class="fw-bold">Prezzo:</span> 9.99€</p>
                <a href="{{route('user.checkout', ['sponsorization' => 3])}}" class="btn btn-light">Vai all'acquisto</a>
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
