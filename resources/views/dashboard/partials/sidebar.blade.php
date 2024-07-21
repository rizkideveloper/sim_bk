<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/assets/dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SMK Medikacom</span>
    </a>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item ">
                <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home text-white"></i>
                    <p class="text-white">
                        Dashboard
                        {{-- <span class="badge badge-info right">2</span> --}}
                    </p>
                </a>
            </li>

            @can('admin')
                <li class="nav-header">DATA MASTER</li>

                <li class="nav-item">
                    <a href="/user" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-users text-white"></i>
                        <p class="text-white">
                            Data Pengguna
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/walikelas" class="nav-link {{ Request::is('walikelas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-users text-white"></i>
                        <p class="text-white">
                            Data Wali Kelas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/kelas" class="nav-link {{ Request::is('kelas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-book text-white"></i>
                        <p class="text-white">
                            Data Kelas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/jurusan" class="nav-link {{ Request::is('jurusan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book text-white"></i>
                        <p class="text-white">
                            Data Jurusan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/siswa" class="nav-link {{ Request::is('siswa*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-users text-white"></i>
                        <p class="text-white">
                            Data Siswa
                        </p>
                    </a>
                </li>
            @else
                <li class="nav-header">BIMBINGAN & KONSELING</li>

                @can('bk')
                    <li class="nav-item">
                        <a href="/basisPermasalahan" class="nav-link {{ Request::is('basisPermasalahan*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-columns text-white"></i>
                            <p class="text-white">
                                Basis Permasalahan
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/penangananMasalah" class="nav-link {{ Request::is('penangananMasalah**') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-folder text-white"></i>
                            <p class="text-white">
                                Penanganan Masalah
                            </p>
                        </a>
                    </li>

                @endcan

                @can('walikelas')
                    <li class="nav-item">
                        <a href="/laporanMasalah" class="nav-link {{ Request::is('laporanMasalah*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list text-white"></i>
                            <p class="text-white">
                                Data Laporan Masalah
                            </p>
                        </a>
                    </li>
                @endcan

            @endcan

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
