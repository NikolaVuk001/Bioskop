@php
    $filmSlide1 = App\Models\Film::where('id', App\Models\HomeSlide::find(1)->film_id)->first();
    $filmSlide2 = App\Models\Film::where('id', App\Models\HomeSlide::find(2)->film_id)->first();
    $filmSlide3 = App\Models\Film::where('id', App\Models\HomeSlide::find(3)->film_id)->first();
@endphp


<div id="carousel" class="carousel slide float-center" data-bs-ride="carousel" data-bs-interval="6500" data-bs-touch="true">

    <div class="carousel-inner">


        <div class="carousel-item slider-item active">
            <!-- Film 1 Slika -->
            <a href="{{ url('/Film/Detalji/' . $filmSlide1->id) }}">
                <picture>
                    <!-- Mobile Image -->
                    <source srcset="{{ asset($filmSlide1->poster) }}" media="(max-width: 600px)">
                    <!-- Desktop Image -->
                    <source srcset="{{ asset($filmSlide1->slide_poster) }}" media="(min-width: 601px)">
                    <!-- Fallback Image -->
                    <img src="{{ asset($filmSlide1->slide_poster) }}" id="Slika1" alt="Slika Filma"
                        class="img-carousel">
                </picture>
            </a>
            <!-- slika caption -->
            <div class="carousel-caption">
                <div class="container">
                    <div class="row justify-content-start text-left">
                        <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                            <h1 class="pb-3">{{ $filmSlide1->naziv_filma }}</h1>
                            <p>{{ $filmSlide1->opis_kratak }}</p>
                            <p>
                                <a href="{{ url('/Repertoar/Film/' . $filmSlide1->id) }}"
                                    class="btn btn-danger btn-lg">Kupi Karte</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="carousel-item slider-item ">
            <!-- Film 2 Slika -->
            <a href="{{ url('/Film/Detalji/' . $filmSlide2->id) }}">
                <picture>
                    <!-- Mobile Image -->
                    <source srcset="{{ asset($filmSlide2->poster) }}" media="(max-width: 600px)">
                    <!-- Desktop Image -->
                    <source srcset="{{ asset($filmSlide2->slide_poster) }}" media="(min-width: 601px)">
                    <!-- Fallback Image -->
                    <img src="{{ asset($filmSlide2->slide_poster) }}" id="Slika1" alt="Slika Filma"
                        class="img-carousel">
                </picture>
            </a>
            <!-- slika caption -->
            <div class="carousel-caption">
                <div class="container">
                    <div class="row justify-content-start text-left">
                        <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                            <h1 class="pb-3">{{ $filmSlide2->naziv_filma }}</h1>
                            <p>{{ $filmSlide2->opis_kratak }}</p>
                            <p>
                                <a href="{{ url('/Repertoar/Film/' . $filmSlide2->id) }}"
                                    class="btn btn-danger btn-lg">Kupi Karte</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-item slider-item ">
            <!-- Film 3 Slika -->
            <a href="{{ url('/Film/Detalji/' . $filmSlide3->id) }}">
                <picture>
                    <!-- Mobile Image -->
                    <source srcset="{{ asset($filmSlide3->poster) }}" media="(max-width: 600px)">
                    <!-- Desktop Image -->
                    <source srcset="{{ asset($filmSlide3->slide_poster) }}" media="(min-width: 601px)">
                    <!-- Fallback Image -->
                    <img src="{{ asset($filmSlide3->slide_poster) }}" id="Slika1" alt="Slika Filma"
                        class="img-carousel">
                </picture>
            </a>
            <!-- slika caption -->
            <div class="carousel-caption">
                <div class="container">
                    <div class="row justify-content-start text-left">
                        <div class="col-12 d-md-block d-sm-none hidden-mobile py-3 mx-0">
                            <h1 class="pb-3">{{ $filmSlide3->naziv_filma }}</h1>
                            <p>{{ $filmSlide3->opis_kratak }}</p>
                            <p>
                                <a href="{{ url('/Repertoar/Film/' . $filmSlide3->id) }}"
                                    class="btn btn-danger btn-lg">Kupi Karte</a>
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
