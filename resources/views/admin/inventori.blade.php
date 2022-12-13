@extends("admin.template")

@section("header_title", "INPUT INVENTORI")
@section("header_menu", "Dashboard")
@section("header_submenu", "Inventori")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <form>
                        <div class="card-header">
                            <h3 class="card-title">Form Input Inventori</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Ruangan</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan nama ruangan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Barang</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan jumlah barang">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Stok Barang</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan stok barang">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Penggunaan Barang</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                       placeholder="Masukan penggunaan barang">
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
