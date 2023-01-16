@extends("admin.template")

@section("header_title", "Dashboard")
@section("header_menu", "Dashboard")
@section("header_submenu", "")

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-danger">
                    <div class="inner">
                        <h3>150</h3>

                        <p>Pelajaran</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-th"></i>
                    </div>
                    <a href="{{ route('course.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Ruang Kelas</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-school"></i>
                    </div>
                    <a href="{{ route('class-room.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-warning">
                    <div class="inner">
                        <h3>44</h3>

                        <p>Inventori</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-boxes"></i>
                    </div>
                    <a href="{{ route('inventory.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-cyan">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-users"></i>
                    </div>
                    <a href="{{ route('student.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-indigo">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Guru</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-chalkboard-teacher"></i>
                    </div>
                    <a href="{{ route('teacher.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">Card title</h5>--}}

{{--                        <p class="card-text">--}}
{{--                            Some quick example text to build on the card title and make up the bulk of the--}}
{{--                            card's--}}
{{--                            content.--}}
{{--                        </p>--}}

{{--                        <a href="#" class="card-link">Card link</a>--}}
{{--                        <a href="#" class="card-link">Another link</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="card card-primary card-outline">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5 class="card-title">Card title</h5>--}}

{{--                        <p class="card-text">--}}
{{--                            Some quick example text to build on the card title and make up the bulk of the--}}
{{--                            card's--}}
{{--                            content.--}}
{{--                        </p>--}}
{{--                        <a href="#" class="card-link">Card link</a>--}}
{{--                        <a href="#" class="card-link">Another link</a>--}}
{{--                    </div>--}}
{{--                </div><!-- /.card -->--}}
{{--            </div>--}}
{{--            <!-- /.col-md-6 -->--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h5 class="m-0">Featured</h5>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <h6 class="card-title">Special title treatment</h6>--}}

{{--                        <p class="card-text">With supporting text below as a natural lead-in to additional--}}
{{--                            content.</p>--}}
{{--                        <a href="#" class="btn btn-primary">Go somewhere</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="card card-primary card-outline">--}}
{{--                    <div class="card-header">--}}
{{--                        <h5 class="m-0">Featured</h5>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <h6 class="card-title">Special title treatment</h6>--}}

{{--                        <p class="card-text">With supporting text below as a natural lead-in to additional--}}
{{--                            content.</p>--}}
{{--                        <a href="#" class="btn btn-primary">Go somewhere</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.col-md-6 -->--}}
{{--        </div>--}}
        <!-- /.row -->
    </div>
@endsection
