@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')

<h1>funziona</h1>
    <div style="background:#fff; width:800px; height:600px">
        <canvas id="myChart" ></canvas>
    </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
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
  </script>
@endsection