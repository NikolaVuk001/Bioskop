@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@php
  $datum_today_str = Carbon\Carbon::today()->toDateString();
  $datum_str = Carbon\Carbon::parse($datum_p);
  $datum_str = date("d.m.Y", strtotime($datum_str ));
  
  
@endphp

<div class="container">
  <nav class="navbar nav-expand-lg filter-navbar">
      <div class="container justify-content-center">
          <ul>
              <li class="nav-item">
                <i class="fa-regular fa-calendar-days"></i>
                <label for="#datumi" class="hidden-mobile">Datum:</label>
                <select name="datum" id="datumi" class="filter-select">
                  <option id="x" selected>{{$datum_str}}</option>                  
                </select>
              </li>                           
              <div class="vr hidden-xs hidden-mobile"></div>
              <li>
                <label for="#zanr">Zanr:</label>
                
                  <select name="" id="zanr" class="filter-select">
                    <option value="all" {{ 'all' == $zanr_p ? "selected" : "" }}>Sve</option>
                    <option value="akcija" {{ 'akcija' == $zanr_p ? "selected" : "" }}>Akcija</option>
                    <option value="animacija" {{ 'animacija' == $zanr_p ? "selected" : "" }}>Animirani</option>
                    <option value="avantura" {{ 'avantura' == $zanr_p ? "selected" : "" }}>Avantura</option>
                    <option value="biografija" {{ 'biografija' == $zanr_p ? "selected" : "" }}>Biografski</option>
                    <option value="drama" {{ 'drama' == $zanr_p ? "selected" : "" }}>Drama</option>
                    <option value="horor" {{ 'horor' == $zanr_p ? "selected" : "" }}>Horor</option>
                    <option value="komedija" {{ 'komedija' == $zanr_p ? "selected" : "" }}>Komedija</option>
                    <option value="misterija" {{ 'misterija' == $zanr_p ? "selected" : "" }}>Misterija</option>
                    <option value="triler" {{ 'triler' == $zanr_p ? "selected" : "" }}>Triler</option>
                  </select>
              </li>
          </ul>
      </div>
  </nav>

  
  

    


    @foreach ($films as $film)
    
    <div class="card mb-3 mt-10 projekcija-card" style="max-width: 100%">
      <div class="row g-0">
        <div class="col-md-4">
          <a href="{{url('Film/Detalji/' . $film->id)}}"><img src="{{asset($film->poster)}}" class="img-fluid rounded-start w-100 h-100" alt="..."></a>          
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{$film->naziv_filma}}</h5>
            <h4 class="card-title">Pocetak Prikazivanja: {{$film->pocetak_prikazivanja}}</h4>       
            <p class="card-text">{{$film->duzina_filma}}</p>
            <p class="card-text">Zanr: {{$film->zanr}}</p>

            @php
              $projekcije_filma = App\Models\Projekcija::where('film_id', $film->id)->whereDate('datum_i_vreme', Carbon\Carbon::parse($datum_p))->get();              
            @endphp
            <div class="row">
            @foreach ($projekcije_filma as $projekcija)

            <div class="col-4">
              <a href="{{url('/Projekcija/' . $projekcija->id . '/OdabirMesta')}}"><button class="btn btn-primary bsb-btn-2xl projekcija-btn">{{Illuminate\Support\Str::substr($projekcija->datum_i_vreme, 11, 5)}}</button></a>
            </div>
              
            @endforeach
            
            
              
              
            <p>{{$film->opis_kratak}}</p>
            <p>Distiributer: {{$film->distributer}}</p>
          </div>
        </div>
        <div class="row">  
          <div class="col">
            <a href="{{url('Film/Detalji/' . $film->id)}}" class="btn btn-danger bsb-btn-2xl float-end mb-2">Vise O Filmu</a>
          </div>
        </div>
      </div>
    </div>
  </div>
      
    @endforeach


    <script>
      $(document).ready(function () {
          $("#zanr").change(function() {
          var storedValue = localStorage.getItem('#zanr');
          var $zanr = ($(this).find(':selected').val()).toString();
          var $datum = $('#datumi').find(':selected').val();
          var baseUrl = '{{ url('/Repertoar') }}';
          var url = baseUrl + '/' + $datum + '/Zanr/' + $zanr;
          if (url != "") {                        
            //$("#output").text(url);
            window.location.href = url;
          }
        }).val(storedValue);
      });

    </script>

<script>
  $(document).ready(function () {
      $("#datumi").change(function() {
      var $datum = $(this).find(':selected').val();
      var $zanr = $('#zanr').find(':selected').val();
      var baseUrl = '{{ url('/Repertoar') }}';
      var url = baseUrl +'/' + $datum + '/Zanr/' + $zanr;
      if (url != "") {                        
        // $("#output").text(url);
        window.location.href = url;
      }
    });
  });
</script>
    


    
@endsection
