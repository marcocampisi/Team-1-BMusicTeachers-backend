@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('main-content')

<h1>funziona</h1>
{{-- {{ dd($monthlyAverages) }} --}}
   
<div class="w-75">
  <canvas id="myChart" width="400" height="200"></canvas>
</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
  <script>
    var data = @json($monthlyAverages);
    var labels = data.map(function(item) {
        return item.mese;
    });
    var values = data.map(function(item) {
        return item.media;
    });
    var reviewCounts = data.map(function(item) {
        return item.num_voti;
    });

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
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
</script>
@endsection