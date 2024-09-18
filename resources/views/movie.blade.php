@extends('layouts.app')

@section('content')
    

    <!-- Button trigger modal -->
    <div class="trejlerBtn">
        <button type="button" class="btn p-0 m-0" style="box-shadow: 0 .5rem .5rem rgba(0,0,0,.2);" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <img src="{{ url($film->slide_poster) }}" alt="">
            <i class="fa-regular fa-circle-play fa-5x playICO"></i>
        </button>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="filter: invert(100%) sepia(85%) saturate(0%) hue-rotate(238deg) brightness(103%) contrast(101%);"></button>
                </div>
                <div class="modal-body">
                    <div class="ytVideo container w-100 text-center my-500 ratio ratio-16x9">
                        <iframe src="{{$film->trailer_url}}"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="DetaljiFilma" style="background-color: black; width:100%!important; box-shadow: 0 .5rem .5rem rgba(0,0,0,.2); padding:0px;">
      <div class=" AktFilmovi text-center">
        <h1>{{$film->naziv_filma}}</h1>
    </div>
        <div class=" p-0" style="margin: 0px 10vw 0px;" >
            
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ url($film->poster) }}" style="border: 10px solid transparent"
                        alt="">
                </div>
                <div class="col-md-6">
                    <label>Sadrzaj</label>
                    <p>{{$film->opis}}</p>

                    <label>Pocetak Prikazivanja</label>
                    <p>{{$film->pocetak_prikazivanja}}</p>

                    <label>Duzina Trajanja Filma</label>
                    <p>{{$film->duzina_filma}}</p>

                    <label>Zanr</label>
                    <p>{{$film->zanr}}</p>

                    <label>Glumci</label>
                    <p>{{$film->glumci}}</p>

                    <label>Reziser</label>
                    <p>{{$film->reziser}}</p>

                    <label>Distributer</label>
                    <p>{{$film->distributer}}</p>
                    
                </div>
                
            </div>
            <a href="{{url('/Repertoar/Film/' . $film->id)}}" class="btn btn-danger btn-lg float-end">Kupi Karte</a>



            
            

          </div>
          <div class=" AktFilmovi text-center">
            <h1>Galerija</h1>
        </div>
          
<div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6500" data-bs-touch="true" >
  
  <div class="carousel-inner">
    

    @foreach ($slike as $key => $img)
        @if($key == 0)
        
            <div class="carousel-item active galerija">
                
                    <img src="{{asset($img->naziv_slike)}}"  alt="Slika Filma" class="w-100 img-responsive" style="height: 80vh">        
                       
                </div>
        
        
        @else
            <div class="carousel-item galerija">
                
                    <img src="{{asset($img->naziv_slike)}}"  alt="Slika Filma" class="w-100 img-responsive" style="height: 80vh">        
                       
                </div>

        
        @endif
        
        
    @endforeach


      


      <!-- Indikatori Za Slider -->
      <div class="carousel-indicators">
        @foreach ($slike as $key => $img)
        @if ($key == 0)
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        @else     
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{$key}}" aria-label="Slide {{$key+1}}"></button>  
        @endif
        
            
        @endforeach
          {{-- <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
              aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
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






        
    </div>
    </div>
    <div class="" style="width:100%!important">
        @include('inc.aktuelniFimovi')
    </div>
    <div class=" AktFilmovi text-center">
    </div>
    
@endsection

{{-- 
  <iframe width="560" height="315" src="https://www.youtube.com/embed/_g-D_itKkmQ?si=AiU9FxWkydoAE99e" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
--}}
