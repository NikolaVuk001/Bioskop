@extends('admin.admin_master')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Svi Filmovi</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Svi Filmovi</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
		<a href="{{route('add.film')}}" class="btn btn-primary">Dodaj Film</a> 				 
						</div>
					</div>
				</div>
				<!--end breadcrumb-->

				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
			<tr>
				<th></th>
        <th>Poster </th>         
				<th>Naziv Filma </th>										 				
        <th>Pocetak Prikazivanja </th> 
        <th>Cena Karte </th> 
        <th>Distributer </th> 
        <th>Status </th> 

			</tr>
		</thead>
		<tbody>
	@foreach($films as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>				
				<td> <img src="{{ asset($item->poster) }}" style="width: 70px; height:40px;" >  </td>
				<td>{{ $item->naziv_filma }}</td>
				<td>{{ $item->pocetak_prikazivanja }}</td>
				<td>{{ $item->cena_karte }}</td>
				<td>{{ $item->distributer }}</td>
				<td>{{ $item->trenutno_aktivan }}</td>

				<td>
{{-- <a href="{{ route('edit.category',$item->id) }}" class="btn btn-info">Izmeni</a>
<a href="{{ route('delete.category',$item->id) }}" class="btn btn-danger" id="delete" >Obrisi</a> --}}

				</td> 
			</tr>
			@endforeach


		</tbody>
		<tfoot>
			<tr>
				<th>Film Id </th>
        <th>Poster </th>         
				<th>Naziv Filma </th>										 				
        <th>Pocetak Prikazivanja </th> 
        <th>Cena Karte </th> 
        <th>Distributer </th> 
        <th>Status </th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>



			</div>




@endsection