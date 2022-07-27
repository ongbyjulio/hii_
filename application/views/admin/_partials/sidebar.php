<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-anchor"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pariwisata</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/home') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Content
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-paint-brush"></i>
                    <span>Post</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Post :</h6>
                        <a class="collapse-item" href="<?php echo site_url('admin/post/add') ?>">New Post</a> 
                        <a class="collapse-item" href="<?php echo site_url('admin/post') ?>">Postingan Saya</a>
                        <a class="collapse-item" href="<?php echo site_url('admin/kategori') ?>">Kategori</a>
                        <a class="collapse-item" href="<?php echo site_url('admin/about') ?>">About</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
           <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/location/') ?>">
                    <i class="fas fa-fw fa-map-marker"></i>
                    <span>Lokasi Wisata</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
         

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/user') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Admin</span></a>
            </li>

            <div class="sidebar-heading">
                Pengunjung
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('admin/mail') ?>">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Inbox <span class="badge badge-danger badge-counter"><?php echo getInboxNew(); ?></span></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>