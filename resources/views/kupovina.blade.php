@extends('layouts.app')

<link rel="stylesheet" href="css/ulaznica.css">

@section('content')
    <style>
        .container p {
            color: black;
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
    </style>
    <link href="https://fonts.googleapis.com/css?family=Cabin|Indie+Flower|Inknut+Antiqua|Lora|Ravi+Prakash" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    @php
        $datum_format = date('d-m-Y', strtotime($projekcija->datum_i_vreme));
        $vreme_format = date('H:i', strtotime($projekcija->datum_i_vreme));
        $red = Illuminate\Support\Str::substr($sedista, 0, 1);
        $sed = Illuminate\Support\Str::of('')->append(Illuminate\Support\Str::substr($sedista, 2, 1));
        $sed = Illuminate\Support\Str::of($sed)->append('-');

        for ($i = 1; $i < strlen($sedista); $i = $i + 4) {
            $sed = Illuminate\Support\Str::of($sed)->append(Illuminate\Support\Str::substr($sedista, $i + 5, 1));
            if (substr($sed, -1) === '-') {
            } else {
                $sed = Illuminate\Support\Str::of($sed)->append('-');
            }
        }
        $sed = substr($sed, 0, -1);
    @endphp
    <hr>
    <div class="container ulaznica">

        <div class="item">
            <div class="item-right">
                <form action="{{ route('stripe.prodaja') }}" method="post" id="payment-form">
                    @csrf
                    <div class="form-row">
                        <label for="card-element">
                            Credit or debit card
                        </label>

                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <p>Molimo da uzmete u obzir da se kupljena ulaznica ne može poništiti. Za više informacija molimo
                            pogledajte naše Uslove korišćenja.</p>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <br>
                    <button class="btn btn-primary"></button>

                    <span class="up-border"></span>
                    <span class="down-border"></span>
            </div> <!-- end item-right -->


            <div class="item-left">
                <div class="row">
                    <div class="col">
                        <p class="event">Projekcija</p>
                        <h2 class="title">{{ $film->naziv_filma }}</h2>

                        <div class="sce">
                            <div class="icon">
                                <i class="fa fa-table"></i>
                            </div>
                            <p>{{ $datum_format }}<br /> {{ $vreme_format }}</p>
                        </div>
                        <div class="fix"></div>
                        <div class="loc">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            @if (strlen($sed) == 1)
                                <p>Red: {{ $red }}<br /> Sediste: {{ $sed }} <br> Sala:
                                    {{ $projekcija->sala_projekcije }}</p>
                            @else
                                <p>Red: {{ $red }}<br /> Sedista: {{ $sed }} <br> Sala:
                                    {{ $projekcija->sala_projekcije }}</p>
                            @endif

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
                                <p>Ulaznica {{ $count }} x {{ $projekcija->cena_karte }},00 DIN</p>
                            </div>
                            <div class="fix"></div>
                            <br>
                            <h2 class="title">CENA</h2>
                            <h2 class="title">RSD {{ $count * $projekcija->cena_karte }},00</h2>
                            <br><br>
                            <div class="fix"></div>
                            <button type="submit" class="btn btn-danger bsb-btn-2xl float-end">Kupi Ulaznice</button>
                            <div class="col"></div>
                            <input type="text" name="uk_cena" id="uk_cena"
                                value="{{ $count * $projekcija->cena_karte }}" hidden>
                            <input type="text" name="cena_karte" id="cena_karte" value="{{ $projekcija->cena_karte }}"
                                hidden>
                            <input type="text" name="datum_projekcije" id="datum_projekcije" value="{{ $datum_format }}"
                                hidden>
                            <input type="text" name="vreme_projekcije" id="vreme_projekcije" value="{{ $vreme_format }}"
                                hidden>
                            <input type="text" name="sala" id="sala" value="{{ $projekcija->sala_projekcije }}"
                                hidden>
                            <input type="text" name="br_karata" id="br_karata" value="{{ $count }}" hidden>
                            <input type="text" name="film_id" id="film_id" value="{{ $film->id }}" hidden>
                            <input type="text" name="projekcija_id" id="projekcija_id" value="{{ $projekcija->id }}"
                                hidden>
                            <input type="text" name="sedista" id="sedista" value="{{ $sedista }}" hidden>

                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end item-right -->

        </div> <!-- end item -->
    </div>







    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe(
            'pk_test_51OiwBoKVJdMdHQXZLYXztkTdX8YPnpwiBsC4TAdLnWTIlMMmJg5wrPPei8yScq2qnSlcJ14N48AoinB0izEUaL4j00hKDuvSPK'
        );
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>
@endsection
