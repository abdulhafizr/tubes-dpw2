@extends("admin.template")

@section("header_title", "INPUT SISWA")
@section("header_menu", "Dashboard")
@section("header_submenu", "Siswa")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <form>
                        <div class="card-header">
                            <h3 class="card-title">Form Input Siswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Induk Siswa (NIS) Siswa</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan nis siswa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Siswa</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan nama siswa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelas Siswa</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan kelas siswa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat Siswa</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan alamat siswa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir Siswa</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan tempat lahir siswa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Telepon Siswa</label>
                                <input type="tel" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan no telepon siswa">
                            </div>
                            <div class="form-group">
                                <label>Kelamin Siswa</label>
                                <select class="form-control">
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Wali Siswa</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan wali siswa">
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
