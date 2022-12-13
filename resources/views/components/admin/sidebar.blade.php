<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/index3.html" class="brand-link">
        <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
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
                    <a href="/dashboard" class="nav-link {{Request::path() == "dashboard" ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/pelajaran" class="nav-link {{Request::path() == "dashboard/pelajaran" ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Pelajaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/ruangan" class="nav-link {{Request::path() == "dashboard/ruangan" ? 'active' : ''}}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>Ruangan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/inventori" class="nav-link {{Request::path() == "dashboard/inventori" ? 'active' : ''}}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Inventori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/siswa" class="nav-link {{Request::path() == "dashboard/siswa" ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Siswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/guru" class="nav-link {{Request::path() == "dashboard/guru" ? 'active' : ''}}">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>Guru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
