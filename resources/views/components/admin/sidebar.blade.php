<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{Request::is('dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('course.index') }}" class="nav-link {{ Request::is('dashboard/course*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Pelajaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('class-room.index') }}" class="nav-link {{Request::is('dashboard/class*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>Ruang Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inventory.index') }}" class="nav-link {{Request::is('dashboard/inventory*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Inventori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student.index') }}" class="nav-link {{Request::is('dashboard/student*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Siswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher.index') }}" class="nav-link {{Request::is('dashboard/teacher*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>Guru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="post" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="nav-link d-flex align-items-center text-nav-item bg-transparent border-0">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
