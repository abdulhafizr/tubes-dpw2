@extends("admin.template")

@section("header_title", "INPUT PELAJARAN")
@section("header_menu", "Dashboard")
@section("header_submenu", "Pelajaran")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <form method="post" action="/dashboard/pelajaran">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Form Input Pelajaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama-pelajaran">Nama Pelajaran</label>
                                <input type="text" class="form-control" id="nama-pelajaran" name="nama_pelajaran"
                                       placeholder="Masukan nama pelajaran">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jadwal Pelajaran Mulai</label>
                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="jam_mulai"
                                                   data-target="#timepicker">
                                            <div class="input-group-append" data-target="#timepicker"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jadwal Pelajaran Selesai</label>
                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="jam_selesai"
                                                   data-target="#timepicker">
                                            <div class="input-group-append" data-target="#timepicker"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama-kelas">Nama Kelas</label>
                                <input type="text" class="form-control" id="nama-kelas" name="nama_kelas"
                                       placeholder="Masukan nama kelas">
                            </div>
                            <div class="form-group">
                                <label for="nama-guru">Nama Guru</label>
                                <input type="text" class="form-control" id="nama-guru" name="nama_guru"
                                       placeholder="Masukan nama guru">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
