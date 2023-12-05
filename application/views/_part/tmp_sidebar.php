<div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pustaka<sup>Booking</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('User'); ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Dahsboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('Buku/kategori'); ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Kategori Buku</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('Buku/'); ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Data Buku</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('User/anggota'); ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Data Anggota</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Autentifikasi/logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->