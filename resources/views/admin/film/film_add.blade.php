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
                        <li class="breadcrumb-item active" aria-current="page">Dodaj Novi Film</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Dodaj Novi Film</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('store.film') }}" enctype="multipart/form-data" >
                @csrf

                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Naziv Filma</label>
                                    <input type="text" name="naziv_filma" id="naziv_filma" class="form-control"
                                        >
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Zanr Filma</label>
                                    <div class="bootstrap-tagsinput">
                                        <input name="zanr" id="zanr" type="text" data-role="tagsinput" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Duzina Filma</label>
                                    <input type="text" name="duzina_filma" class="form-control" placeholder="2h 25min">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductDescription" class="form-label">Opis</label>
                                    <textarea class="form-control" name="opis" rows="3"></textarea>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductDescription" class="form-label">Kratak opis</label>
                                    <textarea class="form-control" name="opis_kratak" rows="3"></textarea>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductDescription" class="form-label">Poster</label>
                                    <input class="form-control" type="file" id="formFile" name="poster"
                                        onchange="mainPosterUrl(this)">

                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductDescription" class="form-label">Slide Poster</label>
                                    <input class="form-control" type="file" id="formFile" name="slide_poster">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductDescription" class="form-label">Slike Filma</label>                                    
                                    <input class="form-control" type="file" id="slike_filma[]" name="slike_filma[]" multiple>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Trailer URL</label>
                                    <input type="text" name="trailer_url" class="form-control">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Pocetak Prikazivanja</label>
                                    <input type="text" name="pocetak_prikazivanja" class="form-control"
                                        placeholder="25.01.2023">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Glumci</label>
                                    <div class="bootstrap-tagsinput">
                                        <input name="glumci" type="text" data-role="tagsinput" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Reziser</label>
                                    <input type="text" name="reziser" class="form-control"
                                        >
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Distributer</label>
                                    <input type="text" name="distributer" class="form-control"
                                        >
                                </div>

                                

                                <div class="mb-3 form-group">
                                    <label for="inputPrice" class="form-label">Cena Karte</label>
                                    <input type="text" name="cena_karte" class="form-control" id="inputPrice"
                                        placeholder="00.00">
                                </div>
                                <div class="mb-3 form-check">
                                  <label for="inputPrice" class="form-label">Trenutno U Prodaji</label>
                                  
                                    
                                      <input class="form-check-input" name="trenutno_aktivan" id="trenutno_aktivan" type="checkbox" value="0" id="flexCheckDefault" unchecked="">
                                      <label class="form-check-label" for="flexCheckDefault">Trenutno U Prodaji</label>
                                    
                                                                   
                              </div>
                                <div class="mb-3 d-flex align-items-end justify-content-end">                                  
                                    <input type="submit" class="btn btn-primary btn-lg px-4" value="Dodaj Film"/>                                                              
                                </div>


                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-12 justify-content-center">

                                        <img src="" id="mainPoster" />
                                    </div>




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
      $(document).ready(function (){
          $('#myForm').validate({
              rules: {
                  naziv_filma: {
                      required : true,
                  }, 
                   zanr: {
                      required : true,
                  }, 
                   duzina_filma: {
                      required : true,
                  }, 
                   opis: {
                      required : true,
                  }, 
                   opis_kratak: {
                      required : true,
                  },                   
                   poster: {
                      required : true,
                  }, 
                   slide_poster: {
                      required : true,
                  }, 
                  slike_filma: {
                      required : true,
                  }, 
                  trailer_url: {
                      required : true,
                  }, 
                  pocetak_prikazivanja: {
                      required : true,
                  }, 
                  
                  reziser: {
                      required : true,
                  }, 
                  distributer: {
                      required : true,
                  }, 
                  cena_karte: {
                      required : true,
                  },  
    
              },
              messages :{
                  naziv_filma: {
                      required : 'Molim Vas Unesite Naziv Filma',
                  },
                  zanr: {
                      required : 'Molim Vas Unesite Zanr',
                  },
                  duzina_filma: {
                      required : 'Molim Vas Unesite Duzinu Trajanja Filma',
                  },
                  opis: {
                      required : 'Molim Vas Unesite Opis Filma',
                  },
                  opis_kratak: {
                      required : 'Molim Vas Unesite Kratak Opis Filma',
                  }, 
                  poster: {
                      required : 'Molim Vas Unesite Poster Filma',
                  },
                  slide_poster: {
                      required : 'Molim Vas Unesite Poster Za Slider',
                  },
                  slike_filma: {
                      required : 'Molim Vas Unesite Slike Filma',
                  },
                  trailer_url: {
                      required : 'Molim Vas Unesite Trailer URL Filma',
                  },
                  pocetak_prikazivanja: {
                      required : 'Molim Vas Unesite Datum Pocetka Prikazivanja Filma',
                  },
                  
                  reziser: {
                      required : 'Molim Vas Unesite Rezisera Filma',
                  },  
                  distributer: {
                      required : 'Molim Vas Unesite Rezisera Filma',
                  },              
                  cena_karte: {
                      required : 'Molim Vas Unesite Cenu Karte Za Film',
                  },
              },
              errorElement : 'span', 
              errorPlacement: function (error,element) {
                  error.addClass('invalid-feedback');
                  element.closest('.form-group').append(error);
              },
              highlight : function(element, errorClass, validClass){
                  $(element).addClass('is-invalid');
              },
              unhighlight : function(element, errorClass, validClass){
                  $(element).removeClass('is-invalid');
              },
          });
      });
      
    </script>




    <script type="text/javascript">
        function mainPosterUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainPoster').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
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
