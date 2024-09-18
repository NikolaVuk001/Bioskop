@extends('layouts.app')

@section('content')

<style>
.user {
  border: 2px solid white;
  padding: 2rem;
  background-color: black;
  width: 100%;
  max-width: 800px;
  font-family: 'Anton', sans-serif;
  box-sizing: border-box;
}

.user input {
  color: black;
  padding: 0.4rem;
  margin-bottom: 1rem;
  margin-top: 1rem;
  width: 100%;
}

.profile {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
  align-items: center;
  text-align: center;
}

.user p {
  padding: 0.2rem;
}

.user label {
  display: inline-flex;
}

.user .btn {
  margin-bottom: 1rem;
  margin-top: 1rem;
}

/* Center the container and responsive adjustments */
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1rem;
  
}

@media (max-width: 768px) {
  .user {
    padding: 1rem;
  }

  .profile-card-info .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .profile-card-info .col-md-4 {
    flex: 0 0 100%;
    max-width: 100%;
    margin-bottom: 1rem;
  }

  .profile-card-info .col-sm-6 {
    flex: 0 0 50%;
    max-width: 50%;
  }

  .profile-card-info .card-icon img {
    width: 100%;
    height: auto;
  }
}
</style>

<div class="container">
  <div class="user">
    <div class="profile">
      <div class="profile-title">
        <h3 class="title">Izmena Podataka</h3>
      </div>

      <form id="myForm" action="{{ route('user.update') }}" method="post">
        @csrf

        <label for="name">Ime</label>
        <input type="text" name="name" id="name" value="{{ ucfirst(Auth::user()->name) }}">  

        <label for="surname">Prezime</label>
        <input type="text" name="surname" id="surname" value="{{ ucfirst(Auth::user()->surname) }}">  

        <label for="email">Mejl Adresa</label>
        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">

        <input type="submit" onclick="this.disabled=true; this.form.submit();" value="Izmeni" class="btn btn-danger btn-lg"> 
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
                <img src="{{ asset('assets/slider/FerrariPoster.jpg') }}" alt="Card">
              </div>                  
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="single-card-info d-flex">
              <div class="card-icon">
                <img src="{{ asset('assets/Posteri/ArgyliePoster.jpg') }}" alt="Card">
              </div>                  
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="single-card-info d-flex">
              <div class="card-icon">
                <img src="{{ asset('assets/slider/PcelarPoster.jpg') }}" alt="Card">
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
