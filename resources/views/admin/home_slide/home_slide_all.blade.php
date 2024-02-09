@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Pocetna Slider</h4>
                            <form action="{{ route('update.slide') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                
                                <br><br>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Slide 1</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="slide1" aria-label="Default select example" >                                            
                                            <option value="{{$slide1->film_id}}" selected="">{{$slide1->nazivFilma}}</option>
                                            @foreach ($films as $film)
                                                <option value="{{ $film->id }}">{{ $film->naziv_filma }}</option>
                                                <img id="showImage1"
                                                src="{{$film->slide_poster}}"
                                                alt="Card image cap"> 
                                            @endforeach                                            
                                            </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Slide 2</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="slide2" aria-label="Default select example" >                                            
                                            <option value="{{$slide2->film_id}}" selected="">{{$slide2->nazivFilma}}</option>
                                            @foreach ($films as $film)
                                                <option value="{{ $film->id }}">{{ $film->naziv_filma }}</option>
                                                <img id="showImage1"
                                                src="{{$film->slide_poster}}"
                                                alt="Card image cap"> 
                                            @endforeach                                            
                                            </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Slide 3</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="slide3" aria-label="Default select example" >                                            
                                            <option value="{{$slide3->film_id}}" selected="">{{$slide3->nazivFilma}}</option>
                                            @foreach ($films as $film)
                                                <option value="{{ $film->id }}">{{ $film->naziv_filma }}</option>
                                                <img id="showImage1"
                                                src="{{$film->slide_poster}}"
                                                alt="Card image cap"> 
                                            @endforeach                                            
                                            </select>
                                    </div>
                                </div>
                                
                                    
                                </div>

                                
                                <br>
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
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script> --}}
@endsection
