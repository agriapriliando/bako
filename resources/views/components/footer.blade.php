<div>
    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="{{ asset('storage/images/setting/' . $logo->isi) }}" alt="#">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter">
                                <h4 class="title">
                                    Website Harga Bahan Pokok
                                    <span>Website ini dikelola oleh Dinas Perdagangan, Koperasi, UKM dan Perindustrian
                                        Kota Palangka Raya</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <form action="#" method="get" target="_blank" class="newsletter-form">
                                        <div class="button">
                                            <button class="btn">Hubungi Kami<span class="dir-part"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <!-- Single Widget -->
                            {!! $footer1->isi !!}
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            {!! $footer2->isi !!}
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            {!! $footer3->isi !!}
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>Kerja Sama</span>
                                <img src="{{ asset('assets/images/footer/logo_footer.png') }}" alt="#">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright">
                                <p>Design By<a href="https://ditaria.com/" rel="nofollow" target="_blank">Ditaria</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li class="{{ $fb->isi == '' ? 'd-none' : '' }}"><a href="{{ $fb->isi }}"><i class="lni lni-facebook-filled"></i></a></li>
                                <li class="{{ $instagram->isi == '' ? 'd-none' : '' }}"><a href="{{ $instagram->isi }}"><i class="lni lni-instagram"></i></a></li>
                                <li class="{{ $xtwitter->isi == '' ? 'd-none' : '' }}"><a href="{{ $xtwitter->isi }}"><i class="lni lni-twitter-original"></i></a></li>
                                <li class="{{ $youtube->isi == '' ? 'd-none' : '' }}"><a href="{{ $youtube->isi }}"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>
</div>
