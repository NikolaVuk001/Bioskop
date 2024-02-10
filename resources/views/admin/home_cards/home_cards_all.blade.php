@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Pocetna Cards</h4>
                            <form action="{{ route('update.cards') }}" method="post">
                                @csrf

                                
                                <br><br>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Card 1</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="card1" aria-label="Default select example" >                                            
                                            <option value="{{$card1->film_id}}" selected="">{{$card1->naziv_filma}}</option>
                                            @foreach ($films as $film)
                                                <option value="{{ $film->id }}">{{ $film->naziv_filma }}</option>
                                                <img id="showImage1"
                                                src="{{$film->poster}}"
                                                alt="Card image cap"> 
                                            @endforeach                                            
                                            </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Card 2</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="card2" aria-label="Default select example" >                                            
                                            <option value="{{$card2->film_id}}" selected="">{{$card2->naziv_filma}}</option>
                                            @foreach ($films as $film)
                                                <option value="{{ $film->id }}">{{ $film->naziv_filma }}</option>
                                                <img id="showImage1"
                                                src="{{$film->poster}}"
                                                alt="Card image cap"> 
                                            @endforeach                                            
                                            </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Card 3</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="card3" aria-label="Default select example" >                                            
                                            <option value="{{$card3->film_id}}" selected="">{{$card3->naziv_filma}}</option>
                                            @foreach ($films as $film)
                                                <option value="{{ $film->id }}">{{ $film->naziv_filma }}</option>
                                                <img id="showImage1"
                                                src="{{$film->poster}}"
                                                alt="Card image cap"> 
                                            @endforeach                                            
                                            </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label">Card 4</label>
                                  <div class="col-sm-10">
                                      <select class="form-select" name="card4" aria-label="Default select example" >                                            
                                          <option value="{{$card4->film_id}}" selected="">{{$card4->naziv_filma}}</option>
                                          @foreach ($films as $film)
                                              <option value="{{ $film->id }}">{{ $film->naziv_filma }}</option>
                                              <img id="showImage1"
                                              src="{{$film->poster}}"
                                              alt="Card image cap"> 
                                          @endforeach                                            
                                          </select>
                                  </div>
                              </div>

                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Card 5</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="card5" aria-label="Default select example" >                                            
                                        <option value="{{$card5->film_id}}" selected="">{{$card5->naziv_filma}}</option>
                                        @foreach ($films as $film)
                                            <option value="{{ $film->id }}">{{ $film->naziv_filma }}</option>
                                            <img id="showImage1"
                                            src="{{$film->poster}}"
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
