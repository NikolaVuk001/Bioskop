@extends('admin.admin_master')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Sve Projekcije</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sve Projekcije</li>
							</ol>
							
						</nav>
						
					</div>
					
					
					<div class="ms-auto">
						<div class="btn-group">
		<a href="{{route('add.projekcija')}}" class="btn btn-primary">Dodaj Projekciju</a> 				 
						</div>
					</div>
				</div>
				<!--end breadcrumb-->

				
				<hr/>
				<div class="card">										
					<div class="card-body">						
						<div class="table-responsive">
							<div class="d-flex float-end">					
								<form class="app-search d-none d-md-block">
									<div class="position-relative">
											<input type="text" class="form-control" placeholder="Search..." style="background-color: grey; color:black">
											<span class="ri-search-line"></span>
									</div>
							</form>
						</div>
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
			<tr>
				<th>#</th>
        <th>Film </th>         
				<th>Film ID </th>										 				
        <th>Datum i Vreme </th> 
        <th>Sala </th> 
        <th>Cena Karte </th> 
        <th>Broj Slobodnih Mesta </th> 

			</tr>
		</thead>
		<tbody>
	@foreach($projekcije as $key => $item)		
			<tr>
				<td> {{ $key+1 }} </td>				
				<td> {{$item->naziv_filma}}  </td>
				<td>{{ $item->film_id }}</td>
				<td>{{ $item->datum_i_vreme }}</td>
				<td>{{ $item->sala }}</td>
				<td>{{ $item->cena_karte }}</td>
        <td>{{ $item->broj_slobodnih_mesta }}</td>
				

				<td>
<a href="{{route('edit.film',$item->id)}}" class="btn btn-info" title="Izmeni Film"><i class="fa fa-pencil"></i></a>
<a href="" class="btn btn-danger" id="delete" title="Obrisi Film"><i class="fa fa-trash"></i></a>



				</td> 
			</tr>
			@endforeach


		</tbody>
		<tfoot>
			<tr>
				<th>#</th>
        <th>Film </th>         
				<th>Film ID </th>										 				
        <th>Datum i Vreme </th> 
        <th>Sala </th> 
        <th>Cena Karte </th> 
        <th>Broj Slobodnih Mesta </th> 
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>



			</div>




@endsection