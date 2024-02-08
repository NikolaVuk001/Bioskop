@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Pocetna Slide</h4>
                            <form action="{{ route('update.slide') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $homeslide->id }}">
                                <br><br>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">nazivFilma</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $homeslide->nazivFilma }}"
                                            id="nazivFilma" name="nazivFilma">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Opis</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $homeslide->opis }}"
                                            id="opis" name="opis">
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-2 col-form-label">Slider Slika</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="image" name="home_slide_img">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ !empty($homeslide->home_slide_img) ? url( $homeslide->home_slide_img) : url('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Izmeni Slide">
                                <!-- end row -->
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>


        </div>
    </div>
{{-- Skripta Za Prikazivanje Odabrane Slike --}}
    <script type="text/javascript">
    
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    
    </script>
@endsection
