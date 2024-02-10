@extends('admin.admin_master')
@section('admin')
    <!-- TagInput Style CSS -->
    <link href="{{ asset('backend/assets/css/tagsinput.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Bioskop</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dodaj Novu Projekciju</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Dodaj Novu Projekciju</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('store.projekcija') }}">
                    @csrf

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">


                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Film</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="film" aria-label="Default select example" onchange="mainPosterUrl(event)">
                                                <option disabled selected="" value="">Izaberite Film</option>
                                                @foreach ($films as $film)
                                                    <option value="{{ $film->id }}">{{ $film->naziv_filma }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                      <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Datum i Vreme Projekcije</label>
                                      <div class="col-sm-10">
                                          <input name="datum_i_vreme" class="form-control" type="datetime-local" value="" id="example-datetime-local-input">
                                      </div>
                                  </div>
                                    
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Sala</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="sala" id="sala" aria-label="Default select example">
                                            <option disabled selected value="">Izaberite Salu</option>
                                            @foreach ($salas as $sala)
                                              <option value="{{$sala->id}}">Sala {{$sala->id}}</option>
                                            @endforeach                               
                                        </select>
                                    </div>
                                </div>

                                    <div class="mb-3 row">
                                        <label for="cena_karte" class="col-sm-2 col-form-label">Cena Karte</label>
                                        <div class="col-sm-10">
                                          <input type="text" name="cena_karte" id="cena_karte"  class="form-control">
                                        </div>
                                    </div>                                    
                                    
                                    <div class="mb-3 d-flex align-items-end justify-content-end">
                                        <input type="submit" class="btn btn-primary btn-lg px-4" value="Dodaj Projekciju" />
                                    </div>


                                </div>
                            </div>

                           

                        </div><!--end row-->
                    </div>
                </form>
            </div>
        </div>

    </div>
    


   





    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    film : {
                        required: true,
                    },
                    datum_i_vreme: {
                        required: true,
                    },
                    sala: {
                        required: true,
                    },
                    cena_karte: {
                        required: true,
                    },

                },
                messages: {
                    film: {
                        required: 'Molim Vas Unesite Film',
                    },
                    datum_i_vreme: {
                        required: 'Molim Vas Unesite Datum i Vreme Projekcije',
                    },
                    sala: {
                        required: 'Molim Vas Unesite Salu',
                    },
                    cena_karte: {
                        required: 'Molim Vas Unesite Cenu karte',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>


  

  

    <script type="text/javascript">
        function slidePosterUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#slidePoster').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
