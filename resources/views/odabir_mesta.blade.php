@extends('layouts.app')

@section('content')

@php
  $datum_format = date("d-m-Y", strtotime($projekcija->datum_i_vreme));
  $vreme_format = date("H:i", strtotime($projekcija->datum_i_vreme));
  const broj_sed = 0;

@endphp


{{-- CSS Style Za Salu --}}
<link rel="stylesheet" href="{{asset('css/sala.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container mt-10">
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{url($projekcija->poster)}}" class="img-fluid " id="avatar" alt="...">
      </div>
      <div class="col-md-8">
        <div class="header_sala">
          <h5 class="card-title">{{$projekcija->naziv_filma}}</h5>
          
          
          <p class="card-text p-0 m-0">Datum: {{$datum_format}}</p>
          <p class="card-text p-0 m-0">Vreme: {{$vreme_format}} </p>
          <p class="card-text p-0 m-0">Sala {{$projekcija->sala}} </p>
          
        </div>
      </div>
    </div>
  </div>

  

 

  <ul class="showcase">
    <li>
      <div class="seat"></div>
      <small>Slobodno</small>
    </li>
    <li>
      <div class="seat selected"></div>
      <small>Izabrano</small>
    </li>
    <li>
      <div class="seat occupied"></div>
      <small>Prodato</small>
    </li>
  </ul>


 


  <div class="container containerSala">
    <div class="screen"></div>
    <div class="container containerSala">
  @php
 
    foreach ($sedista as $key => $sediste) {
      if ($key+1 == 1 || $key+1 == 13 || $key+1 == 25 || $key+1 == 37 || $key+1 == 49 || $key+1 == 61 || $key+1 == 73 || $key+1 == 85 || $key+1 == 97 || $key+1 == 109 ) {
        echo '<div class="row">';
      }
      if(in_array($sediste->oznaka, $niz_zauzetih_mesta))
      {
        echo '<div class="seat occupied" id="' . $sediste->oznaka . '"></div>';
      }
      else {
        echo '<div class="seat" id="' . $sediste->oznaka . '"></div>';
      }
      if($key+1 == 12 || $key+1 == 24 || $key+1 == 36 || $key+1 == 48 || $key+1 == 60 || $key+1 == 72 || $key+1 == 84 || $key+1 == 96 || $key+1 == 108 || $key+1 == 120 ){
        echo '</div>';
      }
    }
  @endphp
    </div>
  
  

 

  


</div>
<form class="from-prevent-multiple-submits" action="{{ url('/Kupovina') }}" method="POST" id="forma">
  @csrf
  <input type="text" value="{{$projekcija->cena_karte}}"  id="cena_karte" name="cena_karte" hidden>
  <input type="text" value="{{$projekcija->projekcija_id}}"  id="projekcija_id" name="projekcija_id" hidden>
  <input type="text" value="{{$projekcija->film_id}}"  id="film_id" name="film_id" hidden>
  <input type="text" value=""  id="count_ul" name="count_ul" hidden>
  <input type="text" value=""  id="sedista_ul" name="sedista_ul" hidden>
  
  <p class="text float-end">
    Izabrali Ste <span id="count"></span> mesta po ceni od <span
      id="total"
      >0</span> Din <span id="sedista" name="sedista"hidden></span>
      <br>
      
      <a href="" class="btn btn-danger bsb-btn-xl float-end"><button type="submit" style="color: white" onclick="kupovinaFunc()">Kupi Karte</button></a>
      
        @if($rezervacije)      
          <a href="" class="btn btn-danger bsb-btn-xl float-end"><button type="submit" style="color: white" onclick="rezervacijaFunc()">Rezervisi Karte</button></a>                    
        @endif     
        
  </p>
  <br><br>
</div>
  

</form>




   

  
  

  

 {{-- JS Za Salu --}}
 <script src="{{ asset('js/sala.js?r=5221') }}"></script>

 <script>
  const $forma = document.getElementById("forma");
  function kupovinaFunc() {   
    $forma.action = "{{ url('/Kupovina') }}"
    var count = $('#count').html();
    $('#count_ul').val(count);
    
    var sedista = $('#sedista').html();
    $('#sedista_ul').val(sedista);
  }
  function rezervacijaFunc() {
    $forma.action = "{{ url('/Rezervacija') }}"
    var count = $('#count').html();
    $('#count_ul').val(count);
    var sedista = $('#sedista').html();
    $('#sedista_ul').val(sedista);
}

 </script>
        



@endsection