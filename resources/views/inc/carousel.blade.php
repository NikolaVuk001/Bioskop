{{-- Carousel --}}



<div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6500" data-bs-touch="true" >

  <div class="carousel-inner">


      <div class="carousel-item active">
          <!-- Dzej Slika -->
          <a href="{{url('/Film')}}"><img src="assets/slider/Nedelja.webp" id="NedeljaSlika" alt="Slika Filma" class="w-100 img-responsive"></a>          
          <!-- slika caption -->
          <div class="carousel-caption">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                          <h1 class="pb-3">Nedelja</h1>
                          <p>     Inspirisan istinitim događajima, donosi priču o Džeju iz najranije mladosti pa sve
                                  do velikog uspeha koji je ostvario. Iako nije imao lako detinjstvo, koje je proveo
                                  uglavnom na ulici
                                  ili u popravnom domu, Džej je uspeo da zauzme svoje mesto na muzičkoj sceni i kroz
                                  pesme postane deo
                                  života mnogih.
                          </p>
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
          <a href="#"><img src="assets/slider/Ferrari.webp" id="FerrariSlika" alt="Slika Filma" class="w-100 img-responsive"></a>          
          <!-- slika caption -->
          <div class="carousel-caption">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                          <h1 class="pb-3">Ferrari</h1>
                          <p>     Nakon spektakla Formule 1, bivši je vozač Enzo Ferrari u krizi.
                                  Bankrot prijeti tvornici koju su on i njegova supruga Laura od temelja izgradili
                                  prije deset godina. Njihov nestalan brak razoren je gubitkom sina Dina godinu dana
                                  ranije. Ferrari se bori i na privatnom planu oko priznanja sina Piera kojeg je dobio
                                  s Linom Lardi.
                          </p>
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
          <a href="#"><img src="assets/slider/Pcelar.webp" id="PcelarSlika" alt="Slika Filma" class="w-100 img-responsive"></a>                    
          <!-- slika caption -->
          <div class="carousel-caption">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                          <h1 class="pb-3">Pcelar</h1>
                          <p>     Od redatelja hitova „Odred otpisanih” i „Fury” stiže nevjerojatna
                                  akcija s akcijskom zvijezdom Jasonom Stathamom u glavnoj ulozi! Nakon što se povukao
                                  iz Pčelara, tajne elitne organizacije, Adam Clay živi usamljeničkim životom brinući
                                  se za svoje pčele. Međutim, kada njegovoj starijoj susjedi prevarom otmu životnu
                                  ušteđevinu s tragičnim posljedicama, Adam Clay se vraća u akciju.
                          </p>
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


