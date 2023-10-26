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

<h3 class="mt-3 text-light">Grafici Valutazioni</h3>

<label for="timeFrameSelect" class="text-light">Seleziona il periodo:</label>
<select id="timeFrameSelect">
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
      <select id="chartType">
          <option value="monthly">Mese</option>
          <option value="yearly">Anno</option>
      </select>
      <canvas id="messageChart"></canvas>
    </div>
    <div class="chart-container">
        <h3 class="mt-3 text-light">Grafico delle Recensioni</h3>
        <label for="reviewChartType" class="text-light">Seleziona il periodo:</label>
        <select id="reviewChartType">
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
