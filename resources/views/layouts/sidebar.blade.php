<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('assets/template/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('saving.index')}}" class="nav-link @yield('tabungan')">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>
                            List Tabungan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('income.index')}}" class="nav-link @yield('pemasukan')">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>
                            List Pemasukan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('expenditure.index')}}" class="nav-link @yield('pengeluaran')">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            List Pengeluaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('debt.index')}}" class="nav-link @yield('hutang')">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            List Hutang
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('users..indexback')}}" class="nav-link @yield('users')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pengguna
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
