@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('main-content')

<h1>funziona</h1>
{{-- {{ dd($monthlyAverages) }} --}}

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
        return item.numReatings;
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
@endsection