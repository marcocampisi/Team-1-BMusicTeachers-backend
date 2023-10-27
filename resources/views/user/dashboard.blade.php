@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('main-content')

  <div class="container-card">
    <h3 class="text-center">Scegli il piano che fa per te</h3>
      <p class="text-center">I profili sponsorizzati appaiono in evidenza nella vetrina. È possibile acquistare più di una sposorizzazione.</p>
  </div>
  <div class="pricing-area py-2">
    <div class="container">
        <div class="row">
            @foreach($sponsorizations as $sponsorization)
                <div class="col-md-4 col-sm-6">
                    <div class="single-price">
                        <div class="price-header">
                            <h3 class="title">{{$sponsorization->name}}</h3>
                        </div>
                        <div class="price-value">
                            <div class="value">
                                <span class="currency">€</span> <span class="amount">{{ $sponsorization->price }}</span> <span class="month text-danger">
                                    @if($sponsorization->duration == 24)
                                        Base
                                    @elseif($sponsorization->duration == 72)
                                        Risparmi <span class="fw-bold fs-5">3€</span>
                                    @elseif($sponsorization->duration == 144)
                                        Risparmi <span class="fw-bold fs-5">8€</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <ul class="deals">
                        </ul>
                        <a href="{{route('user.checkout', ['sponsorization' => $sponsorization->id, 'name' => $sponsorization->name, 'price' => $sponsorization->price])}}" class="fw-bold">Compra Adesso</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-- FINE CSS CARD SPONSORIZZAZIONI --}}

{{-- INIZIO CSS GRAFICI --}}

<h3 class="mt-3 text-light text-center">Grafici Valutazioni</h3>
  <div class="container">
      <label for="timeFrameSelect" class="text-light">Seleziona il periodo:</label>
      <select id="timeFrameSelect" class="form-select w-auto mt-2">
          <option value="month">Mese</option>
          <option value="year">Anno</option>
      </select>
      <div class="chart-rating-container">
          <div class="chart-container m-3">
              <canvas id="chartRatings" ></canvas>
          </div>
          <div class="chart-container m-3">
              <canvas id="chartReviewCounts"></canvas>
          </div>
      </div>
      <div class="chart-rating-container">
          <div class="chart-container m-3">
              <h3 class="mt-3 text-light">Grafici Messaggi</h3>
              <label for="chartType" class="text-light">Seleziona il periodo:</label>
              <select id="chartType" class="form-select w-auto mt-2">
                  <option value="monthly">Mese</option>
                  <option value="yearly">Anno</option>
              </select>
              <canvas id="messageChart"></canvas>
          </div>
          <div class="chart-container m-3">
              <h3 class="mt-3 text-light">Grafico delle Recensioni</h3>
              <label for="reviewChartType" class="text-light">Seleziona il periodo:</label>
              <select id="reviewChartType" class="form-select w-auto mt-2">
                  <option value="monthly">Mese</option>
                  <option value="yearly">Anno</option>
              </select>
              <canvas id="reviewChart"></canvas>
          </div>
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
