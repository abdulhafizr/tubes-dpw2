@extends("admin.template")

@section("header_title", "DAFTAR GURU")
@section("header_menu", "Dashboard")
@section("header_submenu", "Guru")

@section('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">Table daftar guru</h3>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="{{ route('teacher.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-striped dataTable dtr-inline"
                                           aria-describedby="example2_info">
                                        <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                No
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Foto
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                NIP
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Nama
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="">
                                                Alamat
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending" style="">
                                                Tempat Lahir
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="">
                                                Tanggal Lahir
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="">
                                                Telepon
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="">
                                                Jenis Kelamin
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="">
                                                Aksi
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($teachers as $teacher)
                                            <tr class="{{ $loop->index % 2 == 0 ? "odd" : 'even'}}">
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset("$teacher->photo") }}" width="80" height="80" class="img-thumbnail" alt="foto guru">
                                                </td>
                                                <td>{{ $teacher->nip }}</td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->address }}</td>
                                                <td>{{ $teacher->place_of_birth }}</td>
                                                <td>{{ $teacher->date_of_birth }}</td>
                                                <td>{{ $teacher->phone }}</td>
                                                <td>{{ $teacher->gender }}</td>
                                                <td>
                                                    <a href="{{ route('teacher.edit', ['teacher' => $teacher]) }}" type="button" class="btn btn-block btn-warning btn-sm mb-2">Edit</a>
                                                    <form method="post" action="{{ route('teacher.destroy', ['teacher' => $teacher]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-block btn-danger btn-sm mb-2 show_confirm">Hapus</button>
                                                    </form>
                                                    <a href="{{ route('teacher.course', ['teacher' => $teacher]) }}" class="btn btn-block btn-info btn-sm mb-2">Pelajaran</a>
                                                    <a href="{{ route('teacher.student', ['teacher' => $teacher]) }}" class="btn btn-block btn-secondary btn-sm mb-2">Siswa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">No</th>
                                            <th rowspan="1" colspan="1">Foto</th>
                                            <th rowspan="1" colspan="1">NIP</th>
                                            <th rowspan="1" colspan="1">Nama</th>
                                            <th rowspan="1" colspan="1">Alamat</th>
                                            <th rowspan="1" colspan="1">Tempat Lahir</th>
                                            <th rowspan="1" colspan="1">Tanggal Lahir</th>
                                            <th rowspan="1" colspan="1">Telepon</th>
                                            <th rowspan="1" colspan="1">Jenis Kelamin</th>
                                            <th rowspan="1" colspan="1">Aksi</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            {{ $teachers->links() }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('script')
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            const form =  $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Apakah kamu yakin ingin menghapus guru ini?',
                text: "Jika kamu menghapus guru ini, guru ini akan hilang selamanya!",
                icon: "warning",
                confirmButtonText: 'Ok',
                cancelButtonText: 'Batal',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                focusConfirm: false,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

    </script>
@endsection
