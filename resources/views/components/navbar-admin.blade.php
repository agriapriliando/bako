<div>
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <!-- End Topbar -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-10 col-md-12 col-12">
                    <div class="nav-inner">
                        @auth
                            <!-- Start Navbar -->
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul id="nav" class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <a href="{{ url('prices') }}" class="{{ request()->is('prices') ? 'active' : '' }}" aria-label="Toggle navigation">Kelola Harga
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dd-menu collapsed {{ request()->is('categories') ? 'active' : '' }}" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-2"
                                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Kategori</a>
                                            <ul class="sub-menu collapse" id="submenu-1-2">
                                                <li class="nav-item"><a href="{{ url('categories') }}">Daftar Kategor</a></li>
                                                <li class="nav-item"><a href="{{ url('categories/create') }}">Tambah Kategori</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dd-menu collapsed {{ request()->is('items') ? 'active' : '' }}" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-22"
                                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Barang</a>
                                            <ul class="sub-menu collapse" id="submenu-1-22">
                                                <li class="nav-item"><a href="{{ url('items') }}">Daftar Barang</a></li>
                                                <li class="nav-item"><a href="{{ url('items/create') }}">Tambah Barang</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('pasars') }}" class="{{ request()->is('pasars') ? 'active' : '' }}" aria-label="Toggle navigation">Pasar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">Laporan</a>
                                            <ul class="sub-menu collapse" id="submenu-1-3">
                                                <li class="nav-item"><a href="product-grids.html">Hari Ini</a></li>
                                                <li class="nav-item"><a href="product-list.html">Lampau</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-33" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">Setting Lainnya</a>
                                            <ul class="sub-menu collapse" id="submenu-1-33">
                                                <li class="nav-item"><a href="product-grids.html">Slider</a></li>
                                                <li class="nav-item"><a href="product-list.html">Box 1</a></li>
                                                <li class="nav-item"><a href="product-list.html">Box 2</a></li>
                                                <li class="nav-item"><a href="product-list.html">Media Sosial</a></li>
                                                <li class="nav-item"><a href="product-list.html">Data Pasar</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            {{-- <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button><a href="">Logout</a></button>
                                        </form> --}}
                                            <a href="{{ route('logout') }}" aria-label="Toggle navigation">Logout</a>
                                        </li>
                                    </ul>
                                </div> <!-- navbar collapse -->
                            </nav>
                            <!-- End Navbar -->
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
</div>
