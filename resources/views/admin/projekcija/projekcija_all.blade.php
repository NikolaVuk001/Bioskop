@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    <a href="{{ route('add.projekcija') }}" class="btn btn-primary">Dodaj Projekciju</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->


        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="d-flex float-end">
                        <form class="app-search d-none d-md-block from-prevent-multiple-submits">
                            <div class="position-relative">
                                <input id="searchInput" type="text" class="form-control" placeholder="Search..."
                                    style="background-color: grey; color:black">
                                <span class="ri-search-line"></span>
                            </div>
                        </form>
                    </div>
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Film </th>
                                <th>Film ID </th>
                                <th>Datum i Vreme </th>
                                <th>Sala </th>
                                <th>Cena Karte </th>
                                <th>Broj Slobodnih Mesta </th>
                                <th>Akcije </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projekcije as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $item->naziv_filma }} </td>
                                    <td>{{ $item->film_id }}</td>
                                    <td>{{ $item->datum_i_vreme }}</td>
                                    <td>{{ $item->sala_projekcije }}</td>
                                    <td>{{ $item->cena_karte }}</td>
                                    <td>{{ $item->broj_slobodnih_mesta }}</td>


                                    <td>

                                        @if ($item->datum_i_vreme > Carbon\Carbon::now())
                                            @if ($item->broj_slobodnih_mesta == 120)
                                                <a href="{{ route('edit.projekcija', $item->id) }}" class="btn btn-info"
                                                    title="Izmeni Projekciju"><i class="fa fa-pencil"></i></a>
                                            @endif
                                            <a href="{{ route('delete.projekcija', $item->id) }}" class="btn btn-danger"
                                                id="delete" onclick="confirmation(event)" title="Otkazi Projekciju"><i
                                                    class="fa fa-trash"></i></a>
                                        @endif


                                        <a href="{{ route('info.projekcija', $item->id) }}" class="btn btn-primary"
                                            id="info" title="Info Film"><i class="fa fa-eye"></i></a>



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
                                <th>Akcije </th>
                            </tr>
                        </tfoot>
                    </table>
                    <script src="{{ asset('js/search_backend.js?r=522321') }}"></script>
                    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
                    <script>
                        function confirmation(e) {
                            e.preventDefault();
                            var urlToRedirect = e.currentTarget.getAttribute('href');
                            Swal.fire({
                                title: "Brisanje Projekcije",
                                text: "Da li ste sigurni da želite da otkažete projekciju?",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Da, otkaži projekciju."
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = urlToRedirect;
                                }

                            });
                        };
                    </script>
                </div>
            </div>
        </div>



    </div>
@endsection
