@extends("admin.template")

@section("header_title", "DAFTAR PELAJARAN")
@section("header_menu", "Dashboard")
@section("header_submenu", "Pelajaran")

@section('head')
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">Table daftar pelajaran</h3>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="{{ route('course.create') }}" class="btn btn-primary">Tambah</a>
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
                                                Nama Pelajaran
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Jam Mulai
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="">
                                                Jam Selesai
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending" style="">
                                                Kelas
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="">
                                                Guru
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="">
                                                Aksi
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($courses as $course)
                                            <tr class="{{ $loop->index % 2 == 0 ? "odd" : 'even'}}">
                                                <td class="dtr-control sorting_1"
                                                    tabindex="0">{{ $loop->iteration }}</td>
                                                <td>{{ $course->name }}</td>
                                                <td>{{ $course->start_time }}</td>
                                                <td style="">{{ $course->end_time }}</td>
                                                <td style="">{{ $course->class_name }}</td>
                                                <td style="">{{ $course->teacher_name }}</td>
                                                <td style="">
                                                    <div class="row">
                                                        <div class="col col-sm-12 col-md-6">
                                                            <a href="{{ route('course.edit', ['course' => $course]) }}" type="button" class="btn btn-block btn-warning btn-sm">Edit</a>
                                                        </div>
                                                        <div class="col col-sm-12 col-md-6">
                                                            <form method="post" action="{{ route('course.destroy', ['course' => $course]) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-block btn-danger btn-sm show_confirm">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">No</th>
                                            <th rowspan="1" colspan="1">Nama Kelas</th>
                                            <th rowspan="1" colspan="1">Jam Mulai</th>
                                            <th rowspan="1" colspan="1" style="">Jam Selesai</th>
                                            <th rowspan="1" colspan="1" style="">Kelas</th>
                                            <th rowspan="1" colspan="1" style="">Guru</th>
                                            <th rowspan="1" colspan="1" style="">Aksi</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            {{ $courses->links() }}
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
    <script src="/vendor/sweetalert/sweetalert.all.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            const form =  $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Apakah kamu yakin ingin menghapus pelajaran ini?',
                text: "Jika kamu menghapus pelajaran ini, pelajaran ini akan hilang selamanya!",
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
