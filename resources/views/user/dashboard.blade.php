@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('main-content')

<div>
    <img class="back-dash" src="{{ Vite::asset('/resources/img/file-img-pdf/png/note-2.png') }}" alt="note">
</div>
<div class="container-card">
    <h5 class="text-center">Scegli il piano che fa per te</h5>  
</div>
  <div class="container-card">
    <div class="pricing-table">
    <ul class="col-price">
      <li class="header">BASE</li>
      <li class="price"><span>€2.99</span><i>per giorno</i></li>
      <li>1 Giorno</li>
      <li>Nessun Supporto</li>
      <li class="get-it">
        <a href="{{ route('user.checkout', ['sponsorization' => 1]) }}" class="button-card">Compra Adesso</a>
      </li>    
    </ul>
      {{-- <ul class="col-price stand-out">
      <li class="header">BASIC</li>
        <li class="price"><span>$20</span><i>per month</i></li>
      <li>5,000 MB</li>
      <li>15 Email</li>
      <li>10 Databases</li>
      <li>Support</li>
      <li class="get-it"><button type="button">Get it now</button></li>
      </ul> --}}
    <ul class="col-price">
      <li class="header">MEDIO</li>
        <li class="price"><span>€5.99</span><i>per 3 giorni</i></li>
      <li>3 Giorni</li>
      <li>Nessun Supporto</li>
      <li class="get-it">
        <a href="{{ route('user.checkout', ['sponsorization' => 2]) }}" class="button-card">Get it now</a>
      </li>      
    </ul>
      <ul class="col-price">
      <li class="header">PROFESSIONALE</li>
        <li class="price"><span>€9.99</span><i>per una settimana</i></li>
      <li>7 Giorni</li>
      <li>Supporto incluso</li>
      <li class="get-it">
        <a href="{{ route('user.checkout', ['sponsorization' => 3]) }}" class="button-card">Compra Adesso</a>
      </li>       
    </ul>
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
