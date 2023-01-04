@extends("admin.template")

@section("header_title", "EDIT SISWA")
@section("header_menu", "Dashboard")
@section("header_submenu", "Siswa")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <form method="post" action="{{ route('student.update', ['student' => $student]) }}" enctype="multipart/form-data">

                        @csrf
                        @method('put')

                        <div class="card-header">
                            <h3 class="card-title">Form Edit Siswa</h3>
                        </div>
                        <!-- /.card-header -->

                        @include('admin.students.form')

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

