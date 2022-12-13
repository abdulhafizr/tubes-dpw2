@extends("admin.template")

@section("header_title", "INPUT RUANGAN")
@section("header_menu", "Dashboard")
@section("header_submenu", "Ruangan")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <form>
                        <div class="card-header">
                            <h3 class="card-title">Form Input Ruangan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Ruangan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan kode ruangan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Ruangan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan nama ruangan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Meja</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan jumlah meja">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Kursi</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan jumlah kursi">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Proyektor</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan jumlah proyektor">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah AC</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan jumlah AC">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Lemari</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan jumlah lemari">
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
