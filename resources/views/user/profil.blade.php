@extends('layouts.app')

@section('content')

<style>
.user{
  border: 2px solid white;
  margin: 10rem;
  padding: 5rem;
  background-color: black;
  width: 80%;
  height: 100%;
  font-family: 'Anton', sans-serif;
}
.user input{
  color: black;
  padding: 0.4rem;
  margin-bottom: 1rem;
  margin-top: 1rem;
  width: 100%;
}


.profile{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
  align-items: center;
  text-align: center;
  
}

.user p{
  padding: 0.2rem;
}
.user label{
  display: inline-flex;
  
 
}
.user .btn{
  margin-bottom: 1rem;
  margin-top: 1rem;
}
</style>


<div class="container">
<div class="container user">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="profile">
        
        
          <div class="profile-title">
            <h3 class="title">Izmena Podataka</h3>
            
          </div>
          
            <form id="myForm" action="{{route('user.update')}}" method="post">
              @csrf
              
                <label for="name"></label>Ime</h6>
                <input type="text" name="name" id="name" value="{{ucfirst(Auth::user()->name)}}">  

                <label for="name"></label>Prezime</h6>
                <input type="text" name="surname" id="surname" value="{{ucfirst(Auth::user()->surname)}}">  
              
                <label for="email">Mejl Adresa</label>
                <input type="email" name="email" id="email" value="{{Auth::user()->email}}">
                                    
             
           
           <input type="submit" value="Izmeni" class="btn btn-danger btn-lg"> 
                              
          </div>
          </form> 
        </div>
        <div class="profile-footer mt-45">
          <div class="profile-title">
            <h5 class="title">Omiljeni Filmovi</h5>
            
          </div>
          <div class="profile-card-info">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="single-card-info d-flex">
                  <div class="card-icon">
                    <img src="{{asset('assets/slider/FerrariPoster.jpg')}}" alt="Card">
                  </div>                  
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="single-card-info d-flex">
                  <div class="card-icon">
                    <img src="{{asset('assets/Posteri/ArgyliePoster.jpg')}}" alt="Card">
                  </div>                  
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="single-card-info d-flex">
                  <div class="card-icon">
                    <img src="{{asset('assets/slider/PcelarPoster.jpg')}}" alt="Card">
                  </div>                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
      $('#myForm').validate({
          rules: {
              name: {
                  required: true,
              },
              surname: {
                  required: true,
              },
              email: {
                  required: true,
              },
              old_password: {
                  required: true,
              },
              

          },
          messages: {
              name: {
                  required: 'Molim Vas Unesite Vase Ime',
              },
              surname: {
                  required: 'Molim Vas Unesite Vase Prezime',
              },
              email: {
                  required: 'Molim Vas Unesite Vasu Email Adresu',
              },
              old_password: {
                  required: 'Molim Vas Unesite Vas Trenutni Passowrd',
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
@endsection