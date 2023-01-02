@extends("admin.template")

@section("header_title", "INPUT GURU")
@section("header_menu", "Dashboard")
@section("header_submenu", "Guru")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <form method="post" action="{{ route('teacher.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card-header">
                            <h3 class="card-title">Form Input Guru</h3>
                        </div>
                        <!-- /.card-header -->

                        @include('admin.teachers.form')

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

