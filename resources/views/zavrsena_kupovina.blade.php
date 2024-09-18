@extends('layouts.app')

<link rel="stylesheet" href="css/ulaznica.css?r=12332322">

@section('content')
    <style>

        html, body {
            overflow-x: hidden; 
            width: 100%; 
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .StripeElement {
                box-sizing: border-box;
                height: 40px;
                padding: 10px 12px;
                border: 1px solid transparent;
                border-radius: 4px;
                background-color: white;
                box-shadow: 0 1px 3px 0 #e6ebf1;
                -webkit-transition: box-shadow 150ms ease;
                transition: box-shadow 150ms ease;
            }

            .StripeElement--focus {
                box-shadow: 0 1px 3px 0 #cfd7df;
            }

            .StripeElement--invalid {
                border-color: #fa755a;
            }

            .StripeElement--webkit-autofill {
                background-color: #fefde5 !important;
            }
        .container.ulaznica h1,
        .container.ulaznica h2,
        .container.ulaznica label,
        .container.ulaznica h3 {
            font-family: 'Anton', sans-serif;
            font-weight: 200;
            color: black;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Cabin|Indie+Flower|Inknut+Antiqua|Lora|Ravi+Prakash" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    @php
        use Illuminate\Support\Facades\DB;

        $naziv_filma = DB::table('films')
            ->where('id', $karte->first()->film_id)
            ->value('naziv_filma');
        $datum = $karte->first()->datum;
        $vreme = $karte->first()->vreme;
        $red_segmenti = explode('-', $karte->first()->sediste);
        $red = $red_segmenti[0];
        $sed = [];
        $br_rezervacija = 0;
        foreach ($karte as $rez) {
          $rez_segmenti = explode("-",$rez->sediste);
          array_push($sed, $rez_segmenti[1]);
          $br_rezervacija++;
        }
        $cena_karte = $karte->first()->cena;
        $sed_string = collect($sed)->implode('-');
        $sala = $karte->first()->sala_id;
        
    @endphp
    <hr>
    <div class="container ulaznica">

        <div class="item">
            <div class="item-right">
                <form action="" method="post" id="payment-form">

                    <div class="row py-2 ">
                        <h2>Uspešna Kupovina</h2>

                        <div class="qr-code-container">
                          {!! $qr_code !!}                          
                      </div>


                    </div>


                    <span class="up-border"></span>
                    <span class="down-border"></span>
            </div> <!-- end item-right -->


            <div class="item-left">
                <div class="row">
                    <div class="col">
                        <p class="event">Projekcija</p>
                        <h2 class="title">{{ $naziv_filma }}</h2>

                        <div class="sce">
                            <div class="icon">
                                <i class="fa fa-table"></i>
                            </div>
                            <p>{{ $datum }}<br /> {{ $vreme }}</p>
                        </div>
                        <div class="fix"></div>
                        <div class="loc">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <p>Red: {{ $red }}<br /> Sedista: {{$sed_string}}<br> Sala:
                                {{ $sala }}</p>
                            

                        </div>
                        <div class="fix"></div>
                        <div class="col"></div>
                    </div>
                    <div class="col">
                        <div class="col">
                            <br>
                            <h2 class="title">Kategorija</h2>
                            <div class="sce">
                              <div class="icon">
                                  <i class="fa-solid fa-money-bill"></i>
                              </div>
                              <p>Ulaznica {{ $br_rezervacija }} x {{ $cena_karte }},00 DIN</p>
                          </div>

                            <div class="fix"></div>
                            <br>
                            <h2 class="title">CENA</h2>
                            <h2 class="title">RSD {{$br_rezervacija  * $cena_karte}},00</h2>
                            <br><br>
                            <div class="fix"></div>
                            <div class="col"></div>



                        </div>
                    </div>
                    <div class="col">
                        <label>Ime i Prezime</label>
                        <h3>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h3>
                        <br><br>
                        <label>Email adresa</label>
                        <h3>{{ Auth::user()->email }}</h3>
                        <label>Broj Racuna</label>
                        <h3>{{ $racun->invocie_no }}</h3>
                        <p><i>QR pokazati na pultu za ulaz.</i></p>
                        
                        </form>
                    </div>
                </div>
            </div> <!-- end item-right -->

        </div> <!-- end item -->
    </div>
@endsection