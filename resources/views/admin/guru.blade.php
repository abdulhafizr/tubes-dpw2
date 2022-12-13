@extends("admin.template")

@section("header_title", "INPUT GURU")
@section("header_menu", "Dashboard")
@section("header_submenu", "Guru")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <form>
                        <div class="card-header">
                            <h3 class="card-title">Form Input Guru</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Identitas Pegawai Negeri Sipil (NIP)</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan nip">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Guru</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan nama guru">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat Guru</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan alamat guru">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir Guru</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan tempat lahir guru">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir Guru</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan tanggal lahir guru">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Telepon Guru</label>
                                <input type="tel" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan no telepon guru">
                            </div>
                            <div class="form-group">
                                <label>Kelamin Guru</label>
                                <select class="form-control">
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                    <option>Lainnya</option>
                                </select>
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
