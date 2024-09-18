@extends('admin.admin_master')
@section('admin')
    <!-- TagInput Style CSS -->
    <link href="{{ asset('backend/assets/css/tagsinput.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/sala.css') }}">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Bioskop</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Projekcija {{ $projekcija->naziv_filma }} -
                            {{ $projekcija->datum_i_vreme }}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Projekcija {{ $projekcija->naziv_filma }} - {{ $projekcija->datum_i_vreme }}</h5>
                <hr />





                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Id</label>
                                    <input type="text" name="naziv_filma" id="naziv_filma" value="{{ $projekcija->id }}"
                                        class="form-control" disabled>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Naziv Filma</label>
                                    <input type="text" name="naziv_filma" id="naziv_filma"
                                        value="{{ $projekcija->naziv_filma }}" class="form-control" disabled>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Termin</label>
                                    <input type="text" name="naziv_filma" id="naziv_filma"
                                        value="{{ $projekcija->datum_i_vreme }}" class="form-control" disabled>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Sala</label>
                                    <input type="text" name="naziv_filma" id="naziv_filma"
                                        value="{{ $projekcija->sala_projekcije }}" class="form-control" disabled>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Cena Karte</label>
                                    <input type="text" name="naziv_filma" id="naziv_filma"
                                        value="{{ $projekcija->cena_karte }}" class="form-control" disabled>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Broj Slobodnih Mesta</label>
                                    <input type="text" name="naziv_filma" id="naziv_filma"
                                        value="{{ $projekcija->broj_slobodnih_mesta }}" class="form-control" disabled>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Broj Karta</label>
                                    <input type="text" name="naziv_filma" id="naziv_filma" value="{{ $br_karata }}"
                                        class="form-control" disabled>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Broj Rezervacija</label>
                                    <input type="text" name="naziv_filma" id="naziv_filma" value="{{ $br_rezervacija }}"
                                        class="form-control" disabled>
                                </div>






                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="border border-3 p-4 rounded" style="background-color: #cecece">
                                <div class="row g-3">
                                    <div class="col-12 justify-content-center">

                                        <div class="container containerSala">
                                            <div class="screen"></div>
                                            <div class="container containerSala">
                                                @php

                                                    foreach ($sedista as $key => $sediste) {
                                                        if (
                                                            $key + 1 == 1 ||
                                                            $key + 1 == 13 ||
                                                            $key + 1 == 25 ||
                                                            $key + 1 == 37 ||
                                                            $key + 1 == 49 ||
                                                            $key + 1 == 61 ||
                                                            $key + 1 == 73 ||
                                                            $key + 1 == 85 ||
                                                            $key + 1 == 97 ||
                                                            $key + 1 == 109
                                                        ) {
                                                            echo '<div class="row">';
                                                        }
                                                        if (in_array($sediste->oznaka, $niz_zauzetih_mesta)) {
                                                            echo '<div class="seat occupied" id="' .
                                                                $sediste->oznaka .
                                                                '"></div>';
                                                        } else {
                                                            echo '<div class="seat" id="' .
                                                                $sediste->oznaka .
                                                                '"></div>';
                                                        }
                                                        if (
                                                            $key + 1 == 12 ||
                                                            $key + 1 == 24 ||
                                                            $key + 1 == 36 ||
                                                            $key + 1 == 48 ||
                                                            $key + 1 == 60 ||
                                                            $key + 1 == 72 ||
                                                            $key + 1 == 84 ||
                                                            $key + 1 == 96 ||
                                                            $key + 1 == 108 ||
                                                            $key + 1 == 120
                                                        ) {
                                                            echo '</div>';
                                                        }
                                                    }
                                                @endphp
                                            </div>








                                        </div>


                                    </div>




                                </div>
                            </div>
                        </div>

                    </div><!--end row-->
                </div>

            </div>
        </div>


        <div class="card">
            <div class="card-body">

                <div id="scroll-vertical-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>

                    </div>
                    <h5>Rezervacije</h5>
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Rezervacija ID </th>
                                <th>Ime I Prezime </th>
                                <th>Sedište </th>
                                <th>Vreme Rezervacije </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rezervacije as $rezervacija)
                                <tr class="even">
                                    <td>{{ $rezervacija->id }}</td>
                                    <td>{{ $rezervacija->ime_i_prezime }}</td>
                                    <td>{{ $rezervacija->sediste }}</td>
                                    <td>{{ $rezervacija->created_at }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Rezervacija ID </th>
                                <th>Ime I Prezime </th>
                                <th>Sedište </th>
                                <th>Vreme Rezervacije </th>

                            </tr>
                        </tfoot>
                    </table>




                    <h5>Karte</h5>




                    <table id="table2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Karta ID </th>
                                <th>Broj Računa </th>
                                <th>Sedište </th>
                                <th>Vreme Kupovine </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karte as $karta)
                                <tr class="even">
                                    <td>{{ $karta->id }}</td>
                                    <td>{{ App\Models\Racun::where('id', $karta->racun_id)->value('racun_br') }}</td>
                                    <td>{{ $karta->sediste }}</td>
                                    <td>{{ $karta->created_at }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Rezervacija ID </th>
                                <th>Ime I Prezime </th>
                                <th>Sedište </th>
                                <th>Vreme Kupovine </th>

                            </tr>
                        </tfoot>
                    </table>




                </div>
            </div>
            <!-- end card body-->
        </div>

    </div>


    <script src="{{ asset('js/sala.js?r=591') }}"></script>

    <script>
        const $forma = document.getElementById("forma");

        function kupovinaFunc() {
            $forma.action = "{{ url('/Kupovina') }}"
            var count = $('#count').html();
            $('#count_ul').val(count);
            var sedista = $('#sedista').html();
            $('#sedista_ul').val(sedista);
        }

        function rezervacijaFunc() {
            $forma.action = "{{ url('/Rezervacija') }}"
            var count = $('#count').html();
            $('#count_ul').val(count);
            var sedista = $('#sedista').html();
            $('#sedista_ul').val(sedista);
        }
    </script>
@endsection
