@extends("admin.template")

@section('head')
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <style>
        .teacher-photo {
            max-height: 344px;
        }
    </style>
@endsection

@section("header_title", "$title PELAJARAN")
@section("header_menu", "Dashboard")
@section("header_submenu", "Pelajaran")


@section("content")
    <div class="container-fluid">
        <div class="card card-default">
            <form method="post" action="{{ route('course.update', ['course' => $course]) }}">

                @csrf
                @method('put')

                <div class="card-header">
                    <h3 class="card-title">Form Input Pelajaran</h3>
                </div>

                @include('admin.courses.form')

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            //Timepicker
            $('#timepicker1').datetimepicker({
                format: 'LT'
            })
        })
    </script>
@endsection
