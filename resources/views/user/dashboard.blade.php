@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('main-content')

  <div class="container-card">
    <h3 class="text-center">Scegli il piano che fa per te</h5>
  </div>
  <div class="pricing-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="single-price">
                    <div class="price-header">
                        <h3 class="title">Base</h3>
                    </div>
                    <div class="price-value">
                        <div class="value">
                            <span class="currency">$</span> <span class="amount">2.<span>99</span></span> <span class="month">/giornaliero</span>
                        </div>
                    </div>
                    <ul class="deals">
                        <li>Giornaliero.</li>
                        <li>Più Visibilità per un giorno.</li>
                    </ul><a href="{{ route('user.checkout', ['sponsorization' => 1]) }}" class="button-card">Compra Adesso</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-price">
                    <div class="price-header">
                        <h3 class="title">Medio</h3>
                    </div>
                    <div class="price-value">
                        <div class="value">
                            <span class="currency">$</span> <span class="amount">5.<span>99</span></span> <span class="month">/3 giorni</span>
                        </div>
                    </div>
                    <ul class="deals">
                        <li>Tripla Giornaliero.</li>
                        <li>Più Visibilità per tre giorni.</li>
                    </ul><a href="{{ route('user.checkout', ['sponsorization' => 2]) }}" class="button-card">Compra Adesso</a>

                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-price">
                    <div class="price-header">
                        <h3 class="title">Professionale</h3>
                    </div>
                    <div class="price-value">
                        <div class="value">
                            <span class="currency">$</span> <span class="amount">9.<span>99</span></span> <span class="month">/settimanale</span>
                        </div>
                    </div>
                    <ul class="deals">
                        <li>Settimanale.</li>
                        <li>Più Visibilità per una settimana.</li>
                    </ul><a href="{{ route('user.checkout', ['sponsorization' => 3]) }}" class="button-card">Compra Adesso</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- FINE CSS CARD SPONSORIZZAZIONI --}}

{{-- INIZIO CSS GRAFICI --}}

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

{{-- FINE CSS GRAFICI --}}


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
