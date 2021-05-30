<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PT. HANIL JAYA STEEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('image/user_default.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('superadmin.index') }}"
                        class="nav-link {{ request()->is('superadmin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('superadmin/create') }}"
                        class="nav-link {{ request()->is('superadmin/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Tambah Admin</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ request()->is('superadmin/barang') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pen-square"></i>
                        <p>Rekap data</p>
                        <i class="fas fa-angle-left right"></i>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('item.index') }}"
                                class="nav-link {{ request()->is('item') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-box-open"></i>
                                <p>Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pemasukan.index') }}"
                                class="nav-link {{ request()->is('pemasukan') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                                <p>Pemasukan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pengeluaran.index') }}"
                                class="nav-link {{ request()->is('pengeluaran') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-arrow-alt-circle-left"></i>
                                <p>Pengeluaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mutasi.index') }}"
                                class="nav-link {{ request()->is('mutasi') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p>Mutasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('report.index') }}"
                        class="nav-link {{ request()->is('report') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-print"></i>
                        <p>Report</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
