<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <!--<a href="index.html" class="logo">-->
                    <!--Zircos-->
                <!--</a>-->
                <!-- Image Logo -->
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('contents/'.$setting->logo) }}" alt="" height="50">{{ $setting->system_name }}
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">

                    <li class="dropdown navbar-c-items">
                        <span class="badge badge-topbar badge-success">1</span>
                         <a href="#" class="right-menu-item dropdown-toggle waves-effect" data-toggle="dropdown">
                            <i class="mdi mdi-bell"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                            <li class="text-center">
                                <h5>Notifikasi</h5>
                            </li>
                            <li>
                                <a href="#" class="user-list-item">
                                    <div class="icon bg-info">
                                        <i class="mdi mdi-account"></i>
                                    </div>
                                    <div class="user-desc">
                                        <span class="name">Data Ditambahakn</span>
                                        <span class="time">5 hours ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="all-msgs text-center">
                                <p class="m-0"><a href="#">Lihat semua notifikasi</a></p>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown navbar-c-items">
                        <a href="" class="dropdown-toggle waves-effect profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ asset('contents/'.auth()->user()->image) }}" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                            <li class="text-center">
                                <h5>Hai, {{ auth()->user()->name }}</h5>
                            </li>
                            <li><a href="{{ url('profile') }}"><i class="dripicons-user m-r-10"></i> Profil</a></li>
                            @if($role->privilege == 1)
                            <li><a href="{{ url('privilege') }}"><i class="dripicons-lock m-r-10"></i> User Privilege</a></li>
                            <li><a href="{{ url('users') }}"><i class="dripicons-user-group m-r-10"></i> Data User</a></li>
                            @endif
                            @if($role->setting == 1)
                            <li><a href="{{ url('setting') }}"><i class="dripicons-gear m-r-10"></i> Settings</a></li>
                            @endif
                            <li><a href="{{ url('logout') }}"><i class="dripicons-power m-r-10"></i> Logout</a></li>
                        </ul>

                    </li>
                </ul>
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>
            <!-- end menu-extras -->

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu {{ Request::is('/') ? 'active' : null }}">
                        <a href="{{ url('/') }}"><i class="fi-monitor"></i>Dashboard</a>
                    </li>

                    @if($role->pelayanan == 1)
                    <li class="has-submenu {{
                        request()->segment(1) == ('sarana') ||
                        request()->segment(1) == ('kesehatan') ||
                        request()->segment(1) == ('pendidikan') ||
                        request()->segment(1) == ('bencana')
                        ? 'active' : null
                    }}">
                        <a href="#"><i class="fi-help"></i>Pelayanan</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li>
                                        <span>Pelayanan Masyarakat</span>
                                    </li>
                                    <li><a href="{{ url('sarana') }}">Sarana & Prasarana</a></li>
                                    <li><a href="{{ url('kesehatan') }}">Pelayanan Kesehatan</a></li>
                                    <li><a href="{{ url('pendidikan') }}">Pelayanan Pendidikan</a></li>
                                    <li><a href="{{ url('bencana') }}">Bencana Alam</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($role->pembinaan == 1)
                    <li class="has-submenu {{
                        request()->segment(1) == ('komunikasi') ||
                        request()->segment(1) == ('hari-besar') ||
                        request()->segment(1) == ('kegiatan-masyarakat')
                        ? 'active' : null
                    }}">
                        <a href="#"><i class="fi-link"></i>Hubungan</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li>
                                        <span>Pembinaan Hubungan</span>
                                    </li>
                                    <li ><a href="{{ url('komunikasi') }}">Komunikasi Sosial</a></li>
                                    <li ><a href="{{ url('hari-besar') }}">Partisipasi Hari Besar</a></li>
                                    <li ><a href="{{ url('kegiatan-masyarakat') }}">Kegiatan Masyarakat</a></li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($role->pemberdayaan == 1)
                    <li class="has-submenu {{
                        request()->segment(1) == ('modal') ||
                        request()->segment(1) == ('ketrampilan') ||
                        request()->segment(1) == ('pemasaran') ||
                        request()->segment(1) == ('riset')
                        ? 'active' : null
                    }}">
                        <a href="#"><i class="fi-head"></i>Pemberdayaan</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li>
                                        <span>Pemberdayaan</span>
                                    </li>
                                    <li><a href="{{ url('modal') }}">Modal & Usaha</a></li>
                                    <li><a href="{{ url('ketrampilan') }}">Peningkatan Ketrampilan</a></li>
                                    <li><a href="{{ url('pemasaran') }}">Pemasaran Produk</a></li>
                                    <li><a href="{{ url('riset') }}">Riset & Pengembangan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($role->regulasi == 1)
                    <li class="has-submenu {{ request()->segment(1) == 'regulasi' ? 'active' : null }}">
                        <a href="{{ url('regulasi') }}"><i class="fi-clipboard"></i>Regulasi</a>
                    </li>
                    @endif
                    @if($role->quick == 1)
                    <li class="has-submenu {{ request()->segment(1) == 'quick-win' ? 'active' : null }}">
                        <a href="{{ url('quick-win') }}"><i class="fi-fast-forward "></i>Quick Win</a>
                    </li>
                    @endif
                    @if($role->pendanaan == 1)
                    <li class="has-submenu {{
                        request()->segment(1) == ('kode-pendanaan') ||
                        request()->segment(1) == ('laporan-pendanaan')
                        ? 'active' : null
                    }}">
                        <a href="#"><i class="fi-tag"></i>Pendanaan</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li>
                                        <span>Jenis Pendanaan</span>
                                    </li>
                                    <li><a href="{{ url('kode-pendanaan') }}">Kode Pendanaan</a></li>
                                    <li><a href="{{ url('laporan-pendanaan') }}">Laporan Jenis Pendanaan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($role->pengajuan == 1)
                    <li class="has-submenu {{
                        request()->segment(1) == ('laporan-setting') ||
                        request()->segment(1) == ('pengajuan-laporan')
                        ? 'active' : null
                    }}">
                        <a href="#"><i class="fi-paper"></i>Laporan</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li>
                                        <span>Pengajuan Laporan</span>
                                    </li>
                                    <li><a href="{{ url('laporan-setting') }}">Laporan Setting</a></li>
                                    <li><a href="{{ url('pengajuan-laporan') }}">Pengajuan Laporan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if($role->sps == 1 || $role->gm == 1)
                    <li class="has-submenu {{
                        request()->segment(1) == ('laporan-masuk-sps') ||
                        request()->segment(1) == ('laporan-masuk-gm')
                        ? 'active' : null
                    }}">
                        <a href="#"><i class="fi-inbox"></i>Laporan Masuk</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li>
                                        <span>Laporan Masuk</span>
                                    </li>
                                    @if($role->sps == 1)
                                    <li><a href="{{ url('laporan-masuk-sps') }}">Laporan Masuk (SPS)</a></li>
                                    @endif
                                    @if($role->gm == 1)
                                    <li><a href="{{ url('laporan-masuk-gm') }}">Laporan Masuk (GM)</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif

                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
