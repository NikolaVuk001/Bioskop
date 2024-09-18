@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Administratorski Panel</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Bioskop</a></li>
            <li class="breadcrumb-item active">Administratorski Panel</li>
        </ol>
    </div>

</div>
</div>
</div>
<!-- end page title -->

<div class="row">
<div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">Broj Transakcija Danas</p>
                <h4 class="mb-2">{{\App\Models\Racun::whereDate('created_at', \Carbon\Carbon::today())->count()}}</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-primary rounded-3">
                    <i class="ri-shopping-cart-2-line font-size-24"></i>  
                </span>
            </div>
        </div>                                            
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
<div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">Broj Rezervacija Danas</p>
                <h4 class="mb-2">{{\App\Models\Rezervacija::whereDate('created_at', \Carbon\Carbon::today())->count()}}</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-success rounded-3">
                    <i class="mdi mdi-currency-usd font-size-24"></i>  
                </span>
            </div>
        </div>                                              
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
<div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">Broj Transakcija Ovog Meseca</p>
                <h4 class="mb-2">{{\App\Models\Racun::whereBetween('created_at',[ \Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth()])->count()}}</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-primary rounded-3">
                    <i class="ri-user-3-line font-size-24"></i>  
                </span>
            </div>
        </div>                                              
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
<div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">Broj Rezervacija Ovog Meseca</p>
                <h4 class="mb-2">{{\App\Models\Rezervacija::whereBetween('created_at',[ \Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth()])->count()}}</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-success rounded-3">
                    <i class="mdi mdi-currency-btc font-size-24"></i>  
                </span>
            </div>
        </div>                                              
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
</div><!-- end row -->

<div class="row">
 

<div class="row">
<div class="col-xl-12">
<div class="card">
    <div class="card-body">
        <div class="dropdown float-end">
            
         
        </div>

        <h4 class="card-title mb-4">Poslednje Uspešne Transacije</h4>

        <div class="table-responsive">
            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>ID Transkacije</th>
                        <th>Projekcija</th>                        
                        <th>ID Racuna</th>
                        <th>Način plaćanja</th>
                        <th style="width: 120px;">Ukupna Cena</th>
                    </tr>
                </thead><!-- end thead -->
                <tbody>
                                      
                    @foreach ($transakcije_danas_json['data'] as $transakcija)

                        @if ($transakcija['refunded'] === false)
                            @php
                                $racun = \App\Models\Racun::where('payment_type',$transakcija['id'])->firstOrFail();                            
                                $karta = \App\Models\Karta::where('racun_id', $racun->id)->firstOrFail();
                                $projekcija = \App\Models\Projekcija::where('id', $karta->projekcija_id)->firstOrFail();
                            @endphp
                            <tr>
                                <td><h6 class="mb-0">{{$transakcija['id']}}</h6></td>
                                <td>{{$projekcija->naziv_filma}} {{$projekcija->datum_i_vreme}}</td>
                                
                                <td>
                                    {{$racun->id}}
                                </td>
                                <td>
                                    {{$transakcija['payment_method_details']['card']['brand']}}
                                </td>
                                <td>{{substr($transakcija['amount'],0,-2)}} RSD</td>
                            </tr>  
                            
                        @endif
                    
                   
                        
                    @endforeach
                </tbody><!-- end tbody -->
            </table> <!-- end table -->
        </div>
    </div><!-- end card -->
</div><!-- end card -->
</div>
<!-- end col -->
 


</div>
<!-- end row -->
</div>

</div>

@endsection