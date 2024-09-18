@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Svi Moderatori</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Svi Moderatori</li>
                    </ol>

                </nav>

            </div>


            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.moderator') }}" class="btn btn-primary">Dodaj Novog Moderatora</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->


        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="d-flex float-end">
                        <form class="app-search d-none d-md-block">
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
                                <th>Ime </th>
                                <th>Prezime </th>
                                <th>Email </th>
                                <th>Datum i Vreme Kreiranja Naloga </th>
                                <th>Akcije </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($moderatori as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $item->name }} </td>
                                    <td>{{ $item->surname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at }}</td>


                                    <td>
                                        <a href="{{ route('edit.moderator', $item->id) }}" class="btn btn-info"
                                            title="Izmeni Projekciju"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('delete.moderator', $item->id) }}" class="btn btn-danger"
                                            id="delete" onclick="confirmation(event)" title="Otkazi Projekciju"><i
                                                class="fa fa-trash"></i></a>                                        
                                    </td>
                                </tr>                                
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Ime </th>
                                <th>Prezime </th>
                                <th>Email </th>
                                <th>Datum i Vreme Kreiranja Naloga </th>
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
                                title: "Brisanje Moderatora",
                                text: "Da li ste sigurni da želite da obrišete Moderatora?",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Da, obriši moderatora."
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
