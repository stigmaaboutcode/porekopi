            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box text-center">

                            <a href="home" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="logo-sm-light" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="logo-light" height="24">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="mb-3 m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>

                        
                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/favicon.png"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">username</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item
                                <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item text-danger" href="logout.php"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>            
            
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="home" class="waves-effect">
                                    <i class="mdi mdi-home-variant-outline"></i>
                                    <span class="badge rounded-pill bg-primary float-end">3</span>
                                    <span>Dasbor</span>
                                </a>
                            </li> 
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-cart-outline"></i>
                                    <span>Pesanan</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="#">
                                            <span>Keranjang</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Pending</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Dikemas</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Logistik</span>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span>Laporan</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="#">
                                            <span>Pemasukan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Pengeluaran</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-shopping-bag-2-line"></i>
                                <span>Produk</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="#">
                                            <span>Tambah Produk</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Daftar Produk</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>Kategori Produk</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-title">Pengaturan</li>

                            <li>
                                <a href="tentang-toko" class="waves-effect">
                                    <i class="ri-settings-2-line"></i>
                                    <span>Tentang Toko</span>
                                </a>
                            </li> 
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>