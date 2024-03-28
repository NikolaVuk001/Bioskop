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

  {{-- <div class="container containerSala">
    <div class="screen"></div>
    <div class="container containerSala">
      <div class="row" id="red-1">        
        <div class="seat" id="1-1"></div>
        <div class="seat" id="1-2"></div>
        <div class="seat" id="1-3"></div>
        <div class="seat" id="1-4"></div>
        <div class="seat" id="1-5"></div>
        <div class="seat" id="1-6"></div>
        <div class="seat" id="1-7"></div>
        <div class="seat" id="1-8"></div>
        <div class="seat" id="1-9"></div>
        <div class="seat" id="1-10"></div>
        <div class="seat" id="1-11"></div>  
        <div class="seat" id="1-12"></div>      
      </div>
      <div class="row" id="red-2">
        <div class="seat" id="2-1"></div>
        <div class="seat" id="2-2"></div>
        <div class="seat" id="2-3"></div>
        <div class="seat" id="2-4"></div>
        <div class="seat" id="2-5"></div>
        <div class="seat" id="2-6"></div>
        <div class="seat" id="2-7"></div>
        <div class="seat" id="2-8"></div>
        <div class="seat" id="2-9"></div>
        <div class="seat" id="2-10"></div>
        <div class="seat" id="2-11"></div>  
        <div class="seat" id="2-12"></div>       
      </div>
      <div class="row" id="red-3">
        <div class="seat" id="3-1"></div>
        <div class="seat" id="3-2"></div>
        <div class="seat" id="3-3"></div>
        <div class="seat" id="3-4"></div>
        <div class="seat" id="3-5"></div>
        <div class="seat" id="3-6"></div>
        <div class="seat" id="3-7"></div>
        <div class="seat" id="3-8"></div>
        <div class="seat" id="3-9"></div>
        <div class="seat" id="3-10"></div>
        <div class="seat" id="3-11"></div>  
        <div class="seat" id="3-12"></div>       
      </div>
      <div class="row" id="red-4">
        <div class="seat" id="4-1"></div>
        <div class="seat" id="4-2"></div>
        <div class="seat" id="4-3"></div>
        <div class="seat" id="4-4"></div>
        <div class="seat" id="4-5"></div>
        <div class="seat" id="4-6"></div>
        <div class="seat" id="4-7"></div>
        <div class="seat" id="4-8"></div>
        <div class="seat" id="4-9"></div>
        <div class="seat" id="4-10"></div>
        <div class="seat" id="4-11"></div>  
        <div class="seat" id="4-12"></div>       
      </div>
      <div class="row" id="red-5">
        <div class="seat" id="5-1"></div>
        <div class="seat" id="5-2"></div>
        <div class="seat" id="5-3"></div>
        <div class="seat" id="5-4"></div>
        <div class="seat" id="5-5"></div>
        <div class="seat" id="5-6"></div>
        <div class="seat" id="5-7"></div>
        <div class="seat" id="5-8"></div>
        <div class="seat" id="5-9"></div>
        <div class="seat" id="5-10"></div>
        <div class="seat" id="5-11"></div>  
        <div class="seat" id="5-12"></div>       
      </div>
      <div class="row" id="red-6">
        <div class="seat" id="6-1"></div>
        <div class="seat" id="6-2"></div>
        <div class="seat" id="6-3"></div>
        <div class="seat" id="6-4"></div>
        <div class="seat" id="6-5"></div>
        <div class="seat" id="6-6"></div>
        <div class="seat" id="6-7"></div>
        <div class="seat" id="6-8"></div>
        <div class="seat" id="6-9"></div>
        <div class="seat" id="6-10"></div>
        <div class="seat" id="6-11"></div>  
        <div class="seat" id="6-12"></div>        
      </div>
      <div class="row" id="red-7">
        <div class="seat" id="7-1"></div>
        <div class="seat" id="7-2"></div>
        <div class="seat" id="7-3"></div>
        <div class="seat" id="7-4"></div>
        <div class="seat" id="7-5"></div>
        <div class="seat" id="7-6"></div>
        <div class="seat" id="7-7"></div>
        <div class="seat" id="7-8"></div>
        <div class="seat" id="7-9"></div>
        <div class="seat" id="7-10"></div>
        <div class="seat" id="7-11"></div>  
        <div class="seat" id="7-12"></div>         
      </div>
      <div class="row" id="red-8">
        <div class="seat" id="8-1"></div>
        <div class="seat" id="8-2"></div>
        <div class="seat" id="8-3"></div>
        <div class="seat" id="8-4"></div>
        <div class="seat" id="8-5"></div>
        <div class="seat" id="8-6"></div>
        <div class="seat" id="8-7"></div>
        <div class="seat" id="8-8"></div>
        <div class="seat" id="8-9"></div>
        <div class="seat" id="8-10"></div>
        <div class="seat" id="8-11"></div>  
        <div class="seat" id="8-12"></div>       
      </div>
      <div class="row" id="red-9">
        <div class="seat occupied" id="9-1"></div>
        <div class="seat" id="9-2"></div>
        <div class="seat" id="9-3"></div>
        <div class="seat" id="9-4"></div>
        <div class="seat" id="9-5"></div>
        <div class="seat" id="9-6"></div>
        <div class="seat" id="9-7"></div>
        <div class="seat" id="9-8"></div>
        <div class="seat" id="9-9"></div>
        <div class="seat" id="9-10"></div>
        <div class="seat" id="9-11"></div>  
        <div class="seat" id="9-12"></div>        
      </div>

      <div class="row" id="red-9">
        <div class="seat occupied" id="9-1"></div>
        <div class="seat" id="10-2"></div>
        <div class="seat" id="10-3"></div>
        <div class="seat" id="10-4"></div>
        <div class="seat" id="10-5"></div>
        <div class="seat" id="10-6"></div>
        <div class="seat" id="10-7"></div>
        <div class="seat" id="10-8"></div>
        <div class="seat" id="10-9"></div>
        <div class="seat" id="10-10"></div>
        <div class="seat" id="10-11"></div>  
        <div class="seat" id="10-12"></div>        
      </div>
  </div> --}}

 


  <div class="container containerSala">
    <div class="screen"></div>
    <div class="container containerSala">
  @php
 
    foreach ($sedista as $key => $sediste) {
      if ($key+1 == 1 || $key+1 == 13 || $key+1 == 25 || $key+1 == 37 || $key+1 == 49 || $key+1 == 61 || $key+1 == 73 || $key+1 == 85 || $key+1 == 97 || $key+1 == 109 ) {
        echo '<div class="row">';
      }
      if(in_array($sediste->oznaka, $niz_karata))
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
<form action="{{ url('/Kupovina') }}" method="POST">
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
      <a href="" class="btn btn-danger bsb-btn-xl float-end"><button style="color: white" onclick="myFunction()">Kupi Karte</button></a>
  </p>

</form>



   

  
  

  

 {{-- JS Za Salu --}}
 <script src="{{ asset('js/sala.js') }}"></script>

 <script>
  function myFunction() {
    var count = $('#count').html();
    $('#count_ul').val(count);
    var sedista = $('#sedista').html();
    $('#sedista_ul').val(sedista);
}

 </script>
        



@endsection