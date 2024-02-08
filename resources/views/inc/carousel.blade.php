{{-- Carousel --}}

@php
    $homeslide1 = App\Models\HomeSlide::find(1);
    $homeslide2 = App\Models\HomeSlide::find(2);
    $homeslide3 = App\Models\HomeSlide::find(3);
@endphp


<div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6500" data-bs-touch="true" >

  <div class="carousel-inner">


      <div class="carousel-item active">
          <!-- Dzej Slika -->
          <a href="{{url('/Film')}}"><img src="{{$homeslide1->home_slide_img}}" id="NedeljaSlika" alt="Slika Filma" class="w-100 img-responsive"></a>          
          <!-- slika caption -->
          <div class="carousel-caption">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                          <h1 class="pb-3">{{$homeslide1->nazivFilma}}</h1>
                          <p>{{$homeslide1->opis}}</p>
                          <p>
                              <a href="#" class="btn btn-danger btn-lg">Kupi Karte</a>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>


      <div class="carousel-item ">
          <!-- Ferrari Slika -->
          <a href="#"><img src="{{$homeslide2->home_slide_img}}" id="FerrariSlika" alt="Slika Filma" class="w-100 img-responsive"></a>          
          <!-- slika caption -->
          <div class="carousel-caption">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                          <h1 class="pb-3">{{$homeslide2->nazivFilma}}</h1>
                          <p>{{$homeslide2->opis}}</p>
                          <p>
                              <a href="#" class="btn btn-danger btn-lg">Kupi Karte</a>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="carousel-item ">
          <!-- Pcelar Slika -->
          <a href="#"><img src="{{$homeslide3->home_slide_img}}" id="PcelarSlika" alt="Slika Filma" class="w-100 img-responsive"></a>                    
          <!-- slika caption -->
          <div class="carousel-caption">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                          <h1 class="pb-3">{{$homeslide3->nazivFilma}}</h1>
                          <p>{{$homeslide3->opis}}</p>
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


