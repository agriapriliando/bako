<div>
    <style>
        .dropdown .dropdown-menu {
            display: none;
            padding-left: 12px;
        }

        .dropdown:hover>.dropdown-menu,
        .dropend:hover>.dropdown-menu {
            display: block;
        }

        /*
        .dropdown-menu {
            padding-left: 12px;
        } */

        @media screen and (min-width:769px) {
            .dropend:hover>.dropdown-menu {
                position: absolute;
                top: 0;
                left: 100%;
            }
        }
    </style>
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-6">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('assets/images/logo/logo_tulisan.png') }}" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 col-6">
                        <!-- Start Main Menu Search -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Barang">
                            <button class="btn btn-primary" type="button"><i class="lni lni-search-alt"></i></button>
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 d-xs-none">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>Hotline:
                                    <span>085249xxxxxxxx</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-chevron-up"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-chevron-down"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Sembako</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse ms-3" id="navbarText">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Features</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Grafik
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="#">Mingguan</a></li>
                                                <li><a class="dropdown-item" href="#">Bulanan</a></li>
                                                <li><a class="dropdown-item" href="#">Tahunan</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                                Kategori
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                @foreach ($categories as $item)
                                                    {{-- <li><a class="dropdown-item" href="#">Action</a></li> --}}
                                                    <li class="nav-item dropend">
                                                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                                            {{ $item->nama }}
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                            @foreach ($items as $i)
                                                                @if ($i->category_id == $item->id)
                                                                    <li><a class="dropdown-item" href="#">{{ $i->nama }}</a></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <span class="navbar-text">
                                        Navbar text with an inline element
                                    </span>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
</div>
