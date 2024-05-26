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
                    <div class="col-lg-8 col-md-10 col-12">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="{{ url('') }}">
                            <img src="{{ asset('storage/images/setting/' . $logo->isi) }}" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-4 col-md-2 d-xs-none">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                {{-- <i class="lni lni-phone"></i> --}}
                                <h3>Hotline:
                                    <a href="https://api.whatsapp.com/send/?phone={{ $kontak->isi }}"><i class="lni lni-whatsapp"></i> {{ $kontak->isi }}</a>
                                </h3>
                            </div>
                            <div class="navbar-cart d-none">
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
                                <a id="jam2" class="d-block d-md-none" href="#"></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse ms-3" id="navbarText">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="{{ url('') }}">Home</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                                Kategori
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                @foreach ($categories as $item)
                                                    <li class="nav-item dropend">
                                                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                                            {{ $item->nama }}
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                            @foreach ($items as $i)
                                                                @if ($i->category_id == $item->id)
                                                                    <li><a class="dropdown-item" href="{{ url('grafikbarang/' . $i->id) }}">{{ $i->nama }}</a></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Grafik
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="{{ url('grafik/mingguan') }}">Mingguan</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('tentang') }}">Tentang</a>
                                        </li>
                                    </ul>
                                    <span class="navbar-text bg-primary px-3 rounded text-white" id="jam">
                                        {{ Carbon\Carbon::now()->translatedFormat('l, j F Y H:i') . ' WIB' }}
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
    <script type="text/javascript">
        <!--
        function showTime() {
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var thisDay = date.getDay(),
                thisDay = myDays[thisDay];
            var yy = date.getYear();
            var year = (yy < 1000) ? yy + 1900 : yy;
            var tanggal = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;

            var a_p = "";
            var today = new Date();
            var curr_hour = today.getHours();
            var curr_minute = today.getMinutes();
            var curr_second = today.getSeconds();
            // if (curr_hour < 12) {
            //     a_p = "AM";
            // } else {
            //     a_p = "PM";
            // }
            // if (curr_hour == 0) {
            //     curr_hour = 12;
            // }
            // if (curr_hour > 12) {
            //     curr_hour = curr_hour - 12;
            // }
            // curr_hour = checkTime(curr_hour);
            // curr_minute = checkTime(curr_minute);
            // curr_second = checkTime(curr_second);
            var jam = curr_hour + ":" + curr_minute + ":" + curr_second + " WIB";
            document.getElementById('jam').innerHTML = tanggal + ' ' + jam;
            document.getElementById('jam2').innerHTML = tanggal + ' ' + jam;
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        setInterval(showTime, 500);
        //
        -->
    </script>

    <!-- Menampilkan Hari, Bulan dan Tahun -->
    <br>
    <script type='text/javascript'>
        <!--
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth();
        var thisDay = date.getDay(),
            thisDay = myDays[thisDay];
        var yy = date.getYear();
        var year = (yy < 1000) ? yy + 1900 : yy;
        console.log(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
        //
        -->
    </script>
</div>
