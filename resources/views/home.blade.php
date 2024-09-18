@extends('layouts.app')

@section('content')

    @include('inc.carousel')
    @include('inc.aktuelniFimovi')

    

      <div class="my-5" >
        <div class="p-5 text-center bg-body-tertiary" style="background: url('{{ asset('assets/Slike/mudassir-ali-NZ0HxSy55hY-unsplash.jpg') }}'); box-shadow: 0 .5rem .5rem rgba(0,0,0,.2);">


            <div class="container col-xxl-8 px-4 py-5 border-bottom">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-10 col-sm-8 col-lg-5">
                        <img id="3d" src="{{asset('assets/Slike/_ee31305a-1f2b-41b3-bc11-af06bbfd184e.jpg')}}" class="d-block mx-lg-auto img-fluid border border-black" style="box-shadow: 0 .5rem .5rem rgba(0,0,0,.2); filter: blur(0.5px);" width="700" height="500" alt="Bootstrap Themes" loading="lazy">
                    </div>
                    <div class="col-lg-7">
                        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 heading-txt" style="color: white!important">Prepoznatljive Kokice Uz Naše 3D Filmove</h1>
                        <p class="lead">Uživanje u filmu nije potpuno bez naših prepoznatljivih kokica! U kombinaciji sa spektakularnim 3D efektima, naše sveže i hrskave kokice pružaju jedinstveno bioskopsko iskustvo. Prepustite se čarima velikog ekrana i zvuka, dok uživate u najboljem grickalicama koje nudimo. Vaš bioskopski užitak nikada nije bio bolji!

                        </p>
                        <div class="d-flex justify-content-center">
                            <p class="lead">
                                <br>
                                <a href="{{ url('/Repertoar') }}" class="btn btn-danger btn-lg btn-block">Pogledaj Repertoar</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            
            

              <div class="container col-xxl-8 px-4 py-5" >
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                  
                  <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 heading-txt" style="color: white!important">Najnoviji Izbor Filmova</h1>
                    <p class="lead">U našem bioskopu, uvek možete pronaći najnovije i najuzbudljivije filmove. Od najnovijih blokbastera do nezavisnih hitova, naš repertoar nudi raznovrsne naslove za sve ukuse. Dođite i uživajte u premijernim prikazivanjima, specijalnim projekcijama i ekskluzivnim sadržajima koji će zadovoljiti svakog filmofila!</p>
                    <div class="d-flex justify-content-center">
                        <p class="lead">
                            <br>
                            <a href="{{ url('/Film/All/U-Ponudi') }}" class="btn btn-danger btn-lg btn-block">Pogledaj Sve Filmove</a>
                        </p>
                    </div>
                  </div>
                  <div class="col-10 col-sm-8 col-lg-6">
                    <img id="filmovi" src="{{asset('assets/Slike/_c4aef54b-fabe-42da-acd5-5964c64b2940(1).jpg')}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                  </div>
                </div>
              </div>
        </div>
      </div>
      
    
@endsection
