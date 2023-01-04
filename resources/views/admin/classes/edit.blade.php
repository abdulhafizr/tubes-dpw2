@extends("admin.template")

@section("header_title", "EDIT RUANG KELAS")
@section("header_menu", "Dashboard")
@section("header_submenu", "Ruangan Kelas")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <form method="post" action="{{ route('class-room.update', ['class_room' => $class_room]) }}" enctype="multipart/form-data">

                        @csrf
                        @method('put')

                        <div class="card-header">
                            <h3 class="card-title">Form Edit Ruang Kelas</h3>
                        </div>
                        <!-- /.card-header -->

                        @include('admin.classes.form')

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

