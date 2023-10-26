@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('main-content')

<h2 class="my-4">Sponsorizzazioni</h2>
<p class="text-white text-center">I profili sponsorizzati appariranno in evidenza nella vetrina.</p>
<div class="row d-flex w-full justify-content-center flex-wrap mx-3">
    @foreach($sponsorizations as $sponsorization)
        <div class="col-12 col-md-2 mb-2 text-center">
            <div class="card bg-dark text-white">
                <div class="card-header">
                    <h3>{{$sponsorization->name}}</h3>
                    <p class="d-flex align-items-center justify-content-center">{{$sponsorization->price}} €</p>
                </div>
                <div class="card-body">
                    <p>Visibilità: {{$sponsorization->duration}} ore</p>
                    <a href="{{route('user.checkout', ['sponsorization' => $sponsorization->id, 'name' => $sponsorization->name, 'price' => $sponsorization->price])}}" class="btn btn-light">Vai all'acquisto</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<h3 class="mt-3 text-light">Grafici Valutazioni</h3>

<label for="timeFrameSelect" class="text-light">Seleziona il periodo:</label>
<select id="timeFrameSelect" class="form-select w-auto mt-2">
    <option value="month">Mese</option>
    <option value="year">Anno</option>
</select>
<div class="chart-rating-container">
    <div class="chart-container">
      <canvas id="chartRatings" ></canvas>
    </div>
    <div class="chart-container">
      <canvas id="chartReviewCounts"></canvas>
    </div>
</div>
<div class="chart-rating-container">
    <div class="chart-container">
        <h3 class="mt-3 text-light">Grafici Messaggi</h3>
      <label for="chartType" class="text-light">Seleziona il periodo:</label>
      <select id="chartType" class="form-select w-auto mt-2">
          <option value="monthly">Mese</option>
          <option value="yearly">Anno</option>
      </select>
      <canvas id="messageChart"></canvas>
    </div>
    <div class="chart-container">
        <h3 class="mt-3 text-light">Grafico delle Recensioni</h3>
        <label for="reviewChartType" class="text-light">Seleziona il periodo:</label>
        <select id="reviewChartType" class="form-select w-auto mt-2">
            <option value="monthly">Mese</option>
            <option value="yearly">Anno</option>
        </select>
        <canvas id="reviewChart"></canvas>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
    let monthlyData = @json($monthlyAverages);
    let yearlyData = @json($yearlyAverages);
    let monthlyMessagesCounts = @json($monthlyMessagesCounts);
    let yearlyMessagesCounts = @json($yearlyMessagesCounts);
    let monthlyReviewsCounts = @json($monthlyReviewsCounts);
    let yearlyReviewsCounts = @json($yearlyReviewsCounts);
</script>
@endsection
