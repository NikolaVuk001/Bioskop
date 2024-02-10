@extends('layouts.app')

@section('content')


<div class="container mt-5 all-filmovi">


  

  <ul class="nav nav-tabs justify-content-end mb-20 opcije_film">
    @if ($uskoro == 0)
    <li class="nav-item">      
      <a class="nav-link active" aria-current="page" href="{{url('/Film/All/U-Ponudi')}}">U Ponudi</a>
    </li>    
    <li class="nav-item">
      <a class="nav-link" href="{{url('/Film/All/Uskoro')}}">Uskoro</a>
    </li>
    @else
    <li class="nav-item">      
      <a class="nav-link" aria-current="page" href="{{url('/Film/All/U-Ponudi')}}">U Ponudi</a>
    </li>    
    <li class="nav-item">
      <a class="nav-link active" href="{{url('/Film/All/Uskoro')}}">Uskoro</a>
    </li>

    @endif
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Zanr</a>
      <ul class="dropdown-menu">        
        <li><a class="dropdown-item" href="{{url('/Film/All/Zanr/akcija')}}">Akcija</a></li>
        <li><a class="dropdown-item" href="{{url('/Film/All/Zanr/drama')}}">Drama</a></li>
        <li><a class="dropdown-item" href="{{url('/Film/All/Zanr/avantura')}}">Avantura</a></li>
        <li><a class="dropdown-item" href="{{url('/Film/All/Zanr/misterija')}}">Misterija</a></li>
        <li><a class="dropdown-item" href="{{url('/Film/All/Zanr/horror')}}">Horror</a></li>
        <li><a class="dropdown-item" href="{{url('/Film/All/Zanr/triler')}}">Triler</a></li>
        <li><a class="dropdown-item" href="{{url('/Film/All/Zanr/dokumentarni')}}">Dokumentarni</a></li>
        <li><a class="dropdown-item" href="{{url('/Film/All/Zanr/fantazija')}}">Fantazija</a></li>
        <li><a class="dropdown-item" href="{{url('/Film/All/Zanr/romansa')}}">Romansa</a></li>
        <li><a class="dropdown-item" href="{{url('/Film/All/Zanr/komedija')}}">Komedija</a></li>        
      </ul>
    </li>    
  </ul>
  

  <div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($films as $film)
    <div class="col">
      <div class="card">
        <a href="{{url('Film/Detalji/' . $film->id)}}"><img src="{{asset($film->poster)}}" class="card-img-top" alt="..."></a>
        <div class="card-body">
          <h5 class="card-title">{{$film->naziv_filma}}</h5>
          <p class="card-text">{{$film->duzina_filma}}<br>Pocetak Prikazivanja | {{$film->pocetak_prikazivanja}}</p>
          <a href="#" class="btn btn-danger btn-lg">Kupi Karte</a>
        </div>
      </div>
    </div>
      
    @endforeach
   
  </div>
</div>   
@endsection
