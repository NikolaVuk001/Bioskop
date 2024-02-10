@php
    $filmCard1 = App\Models\Film::where("id", App\Models\HomeCards::find(1)->film_id)->first();
    $filmCard2 = App\Models\Film::where("id", App\Models\HomeCards::find(2)->film_id)->first();
    $filmCard3 = App\Models\Film::where("id", App\Models\HomeCards::find(3)->film_id)->first();
    $filmCard4 = App\Models\Film::where("id", App\Models\HomeCards::find(4)->film_id)->first();
    $filmCard5 = App\Models\Film::where("id", App\Models\HomeCards::find(5)->film_id)->first();
@endphp



<link rel="stylesheet" href="css/owl.carousel.css">    
<link rel="stylesheet" href="css/owl.carousel.min.css">   
  <div>
    <div class=" AktFilmovi text-center">
        <h1>Aktuelni Filmovi</h1>
    </div>
</div>
<!-- card area start -->
<div class="card_wrapper">
    <div class="container">
        <div class="row">
          
            <div class="col-12">
                <div class="owl-carousel slider_carousel text-center">
                    <div class="card_box">
                        <a href="{{url('Film/Detalji/' . $filmCard1->id)}}"><img class="img-fluid w-100" src="{{asset($filmCard1->poster)}}" alt=""></a>                        
                        <div class="card_text" id="click">
                            <a href="{{url('Film/Detalji/' . $filmCard1->id)}}"><h4>{{$filmCard1->naziv_filma}}</h4></a>                            
                            <p>{{$filmCard1->duzina_filma}}<br>
                                Pocetak prikazivanja {{$filmCard1->pocetak_prikazivanja}}
                            </p>
                            <p>
                                <a href="#" class="btn btn-danger btn-lg">Kupi Karte</a>
                            </p>
                        </div>
                    </div>
                    <div class="card_box">
                        <a href="{{url('Film/Detalji/' . $filmCard2->id)}}"><img class="img-fluid w-100" src="{{asset($filmCard2->poster)}}" alt=""></a>            
                        <div class="card_text">
                            <a href="{{url('Film/Detalji/' . $filmCard2->id)}}"><h4>{{$filmCard2->naziv_filma}}</h4></a>
                            <p>{{$filmCard2->duzina_filma}}<br>
                                Pocetak prikazivanja {{$filmCard2->pocetak_prikazivanja}}
                            </p>
                            <p>
                                <a href="#" class="btn btn-danger btn-lg">Kupi Karte</a>
                            </p>
                        </div>
                    </div>
                    <div class="card_box">
                        <a href="{{url('Film/Detalji/' . $filmCard3->id)}}"><img class="img-fluid w-100" src="{{asset($filmCard3->poster)}}" alt=""></a>                        
                        <div class="card_text">
                            <a href="{{url('Film/Detalji/' . $filmCard3->id)}}"><h4>{{$filmCard3->naziv_filma}}</h4></a>
                            <p>{{$filmCard3->duzina_filma}}<br>
                                Pocetak prikazivanja {{$filmCard3->pocetak_prikazivanja}}
                            </p>
                            <p>
                                <a href="#" class="btn btn-danger btn-lg">Kupi Karte</a>
                            </p>
                        </div>
                    </div>

                    <div class="card_box">
                        <a href="{{url('Film/Detalji/' . $filmCard4->id)}}"><img class="img-fluid w-100" src="{{asset($filmCard4->poster)}}" alt=""></a>                        
                        <div class="card_text">
                            <a href="{{url('Film/Detalji/' . $filmCard4->id)}}"><h4>{{$filmCard4->naziv_filma}}</h4></a>
                            <p>{{$filmCard4->duzina_filma}}<br>
                                Pocetak prikazivanja {{$filmCard4->pocetak_prikazivanja}}
                            </p>
                            <p>
                                <a href="#" class="btn btn-danger btn-lg">Kupi Karte</a>
                            </p>
                        </div>
                    </div>
                    <div class="card_box">
                        <a href="{{url('Film/Detalji/' . $filmCard5->id)}}"><img class="img-fluid w-100" src="{{asset($filmCard5->poster)}}" alt=""></a>                        
                        <div class="card_text">
                            <a href="{{url('Film/Detalji/' . $filmCard5->id)}}"><h4>{{$filmCard5->naziv_filma}}</h4></a>
                            <p>{{$filmCard5->duzina_filma}}<br>
                                Pocetak prikazivanja {{$filmCard5->pocetak_prikazivanja}}
                            </p>
                            <p>
                                <a href="#" class="btn btn-danger btn-lg">Kupi Karte</a>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>



<!-- card area end -->

