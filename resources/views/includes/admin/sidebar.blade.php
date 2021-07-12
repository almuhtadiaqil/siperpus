<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('image/book_icon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SIPERPUS</span>
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
                    <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('dashboard/create') }}"
                        class="nav-link {{ request()->is('dashboard/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Tambah Petugas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('book.index') }}"
                        class="nav-link {{ request()->is('book') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Buku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}"
                        class="nav-link {{ request()->is('kategori') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penerbit.index') }}"
                        class="nav-link {{ request()->is('penerbit') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>Penerbit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('peminjaman.index') }}"
                        class="nav-link {{ request()->is('peminjaman') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                        <p>Peminjaman</p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
