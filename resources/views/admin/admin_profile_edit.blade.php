@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">


  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Izmena Profila</h4>
                <form action="{{ route('store.profile') }}" method="post" enctype="multipart/form-data">                
                    @csrf
                    <p class="card-title-desc"></p>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Ime</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$editData->name}}" id="name" name="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Prezime</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$editData->surname}}" id="surname" name="surname">
                    </div>
                </div>
                    
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="example-search-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" value="{{$editData->email}}" id="email" name="email">
                        </div>
                    </div>
                    <!-- end row -->

                    {{-- <div class="row mb-3">     
                    <label for="example-email-input" class="col-sm-2 col-form-label">Password</label>             
                    <div class="col-sm-10">
                        <input type="password" id="password" name="password" class="form-control" required="" placeholder="Novi Password">
                    
                    </div> --}}
                    
                    
                    <!-- end row -->
                    <div>
                    <button class="btn btn-primary btn-md float-end" onclick="this.disabled=true; this.form.submit();" type="submit">Izmeni</button>
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