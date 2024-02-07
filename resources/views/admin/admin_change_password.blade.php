@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">


  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Promena Passworda </h4>

                @if (count($errors))
                  @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                    
                  @endforeach
                  
                @endif
                <form action="{{ route('update.password') }}" method="post">                
                    @csrf
                    <br><br>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Stari Passowrd</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" id="oldPassword" name="oldPassword">
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="example-text-input" class="col-sm-2 col-form-label">Novi Passowrd</label>
                      <div class="col-sm-10">
                          <input class="form-control" type="password" id="newPassword" name="newPassword">
                      </div>
                  </div>

                  <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Potvrdi Passowrd</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" id="confirm_passowrd" name="confirm_passowrd">
                    </div>
                </div>

                    <div>
                    
                    <input type="submit" class="btn btn-primary btn-md float-end" value="Izmeni Password">
                    </div>
                    <!-- end row -->


                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>


</div>
</div>

@endsection 