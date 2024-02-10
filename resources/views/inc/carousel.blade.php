{{-- Carousel --}}

@php
    $filmSlide1 = App\Models\Film::where("id", App\Models\HomeSlide::find(1)->film_id)->first();
    $filmSlide2 = App\Models\Film::where("id", App\Models\HomeSlide::find(2)->film_id)->first();
    $filmSlide3 = App\Models\Film::where("id", App\Models\HomeSlide::find(3)->film_id)->first();
@endphp


<div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6500" data-bs-touch="true" >

  <div class="carousel-inner">


      <div class="carousel-item slider-item active">
          <!-- Film 1 Slika -->
          <a href="{{url('/Film')}}"><img src="{{$filmSlide1->slide_poster}}" id="NedeljaSlika" alt="Slika Filma" class="w-100 img-responsive"></a>          
          <!-- slika caption -->
          <div class="carousel-caption">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                          <h1 class="pb-3">{{$filmSlide1->naziv_filma}}</h1>
                          <p>{{$filmSlide1->opis_kratak}}</p>
                          <p>
                              <a href="#" class="btn btn-danger btn-lg">Kupi Karte</a>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>


      <div class="carousel-item slider-item ">
          <!-- Film 2 Slika -->
          <a href="#"><img src="{{$filmSlide2->slide_poster}}"  id="FerrariSlika" alt="Slika Filma" class="w-100 img-responsive"></a>          
          <!-- slika caption -->
          <div class="carousel-caption">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                          <h1 class="pb-3">{{$filmSlide2->naziv_filma}}</h1>
                          <p>{{$filmSlide2->opis_kratak}}</p>
                          <p>
                              <a href="#" class="btn btn-danger btn-lg">Kupi Karte</a>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="carousel-item slider-item ">
          <!-- Film 3 Slika -->
          <a href="#"><img src="{{$filmSlide3->slide_poster}}" id="PcelarSlika" alt="Slika Filma" class="w-100 img-responsive"></a>                    
          <!-- slika caption -->
          <div class="carousel-caption">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                          <h1 class="pb-3">{{$filmSlide3->naziv_filma}}</h1>
                          <p>{{$filmSlide3->opis_kratak}}</p>
                          <p>
                              <a href="#" class="btn btn-danger btn-lg">Kupi Karte</a>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>


      <!-- Indikatori Za Slider -->
      <div class="carousel-indicators">
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
              aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>



      <!-- Strelice Za Slider -->
      <button class="carousel-control-prev d-md-block d-sm-none hidden-mobile" type="button"
          data-bs-target="#carousel" data-bs-slide="prev">
          <span class="fa-solid fa-arrow-left fa-2x"></span>
      </button>

      <button class="carousel-control-next d-md-block d-sm-none hidden-mobile" type="button"
          data-bs-target="#carousel" data-bs-slide="next">
          <span class="fa-solid fa-arrow-right fa-2x"></span>
      </button>

  </div>
</div>


