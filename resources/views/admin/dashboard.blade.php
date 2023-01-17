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
                        <h3>{{ $courses }}</h3>

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
                        <h3>{{ $class_rooms }}</h3>

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
                        <h3>{{ $inventories }}</h3>

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
                        <h3>{{ $students }}</h3>

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
                        <h3>{{ $teachers }}</h3>

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
    </div>
@endsection
