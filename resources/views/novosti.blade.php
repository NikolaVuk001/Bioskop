@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




    <div class="container my-5 py-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg novost-1"
            style="background: url('{{ asset('assets/Slike/IMAX_at_AMC_LandingPage_Pod1_V1_2000x853_R2.png') }}')">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis heading-txt" style="color: white!important">IMAX je
                    Stigao !</h1><br>
                <p class="lead" style="color: white!important; font-size: 2.3vh;">Pripremite se da budete preneseni u nove
                    svetove uz IMAX, uzbudljivo iskustvo gledanja filmova. Svaki element u premijum IMAX bioskopu posebno je
                    dizajniran kako bi se stvorilo intenzivno iskustvo, osiguravajući filmsku magiju svaki put kada se
                    svetla pogase.</p>

            </div>
            <div class="col-lg-4 offset-lg-1 p-0 pb-2 px-5 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="{{ asset('assets/Slike/IMAXatAMC_2019_White.avif') }}" alt=""
                    width="720">
            </div>
        </div>
    </div>

    <div class="w-100 col-xxl-8  py-0">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5 rounded-1 px-5 border-bottom" style="background: black">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ asset('assets/Slike/jaehoon-park-_ouzD8N7EzI-unsplash.jpg') }}"
                    class="d-block mx-lg-auto img-fluid border border-1" alt="Bootstrap Themes" width="700"
                    height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 heading-txt" style="color: white!important">Uvek
                    sveže kokice!</h1><br>
                <p class="lead">Uživajte u filmu uz savršenu užinu! Naša bogata ponuda kokica i grickalica upotpuniće vaše
                    filmsko iskustvo. Bilo da volite klasične puter kokice, ukusne karamele ili začinjene varijante, imamo
                    nešto za svakoga. Uzmite svoju omiljenu užinu i prepustite se čarima filma dok se opuštate u udobnim
                    sedištima našeg bioskopa. Vaša savršena filmska večer počinje ovde!</p>

            </div>
        </div>
    </div>

  




    <div class="px-4 pt-5 my-0 mb-5 text-center align-items-center align-content-center" style="background: black;">
      <h1 class="display-4 fw-bold text-body-emphasis heading-txt" style="color: white!important">Spektakularan
          zvuk i slika u svakoj Sali</h1><br><br>
      <div class="col-lg-6 mx-auto">
          <p class="lead mb-4">U našem bioskopu svaka sala je opremljena najnovijom tehnologijom koja pruža
              kristalno čist zvuk i neverovatnu sliku. Prepustite se uživanju u svakom detalju filma, zahvaljujući
              vrhunskim zvučnicima i velikim ekranima koji stvaraju neponovljivo iskustvo. Svaki film kod nas je
              prava avantura za sva čula!</p>
      </div>
      <div style="max-height: 70vh; text-align: center;">
          <div class="container px-5">
              <img class="img-fluid border rounded-3 shadow-lg mb-4" style="display: inline-block;" src="{{ asset('assets/Slike/geoffrey-moffett-TFRezw7pQwI-unsplash.jpg') }}" alt="Example image" width="700" height="500" loading="lazy">
          </div>
      </div>
  </div>
        @endsection
