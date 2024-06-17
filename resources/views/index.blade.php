<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Pujangga Trans</title>

        <!-- slider stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

        <!-- bootstrap core css -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        {{-- @vite(['resources/css/bootstrap.css', 'resources/css/style.css', 'resources/css/responsive.css']) --}}

        <!-- fonts style -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="hero_area">

            <!-- header section starts -->
            <header class="header_section">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container">
                        <a class="navbar-brand" href="{{ route('dashboard') }}">
                            <span>Pujangga Mandiri Trans</span>
                        </a>

                        <div class="navbar-collapse" id="">
                            <div class="user_option">
                                <a href="{{ route('login') }}">
                                    Login
                                </a>
                            </div>
                            <div class="custom_menu-btn">
                                <button onclick="openNav()">
                                    <span class="s-1"> </span>
                                    <span class="s-2"> </span>
                                    <span class="s-3"> </span>
                                </button>
                            </div>
                            <div id="myNav" class="overlay">
                                <div class="overlay-content">
                                    <a href="{{ route('login') }}">Login</a>
                                    <a href="{{ route('register') }}">Daftar</a>
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- end header section -->

            <!-- slider section -->
            <section class=" slider_section position-relative">
            <div class="slider_container">
                <div class="img-box">
                <img src="{{ asset('assets/static/images/landing-page/hero-img.png') }}" alt="Hero Img" />
                </div>
                <div class="detail_container">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="detail-box">
                                <h1>
                                    Rental <br>
                                    Terpercaya <br>
                                    Tangerang
                                </h1>
                                <a href="">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="detail-box">
                                <h1>
                                    Aman <br>
                                    Bersih <br>
                                    Nyaman
                                </h1>
                                <a href="">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="sr-only">Next</span>
                    </a>
                </div>

                </div>
            </div>
            </section>
            <!-- end slider section -->
        </div>

        <!-- about section -->

        <section class="about_section layout_padding-bottom">
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 px-0">
                <div class="img-box">
                    <img src="{{ asset('assets/static/images/landing-page/about-img.png') }}" class="img-fluid" alt="">
                </div>
                </div>
                <div class="col-md-4 col-lg-3">
                <div class="detail-box">
                    <h2>Pujangga Mandiri Trans</h2>
                    <p>
                        Merupakan perusahaan rental mobil dengan driver atau lepas kunci terpercaya di daerah Jabodetabek khususnya Tangerang.
                    </p>
                </div>
                </div>
            </div>
            </div>
        </section>

        <!-- end about section -->


        <!-- best section -->

        <section class="best_section">
            <div class="container">
                <div class="book_now">
                    <div class="detail-box">
                        <h2>
                            Pilih Kendaraan
                        </h2>
                        <p>
                            Ragam pilihan kendaraan bukti nyata kami telah berdiri dan beroperasi cukup lama.
                        </p>
                    </div>
                    <div class="btn-box">
                        <a href="">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- end best section -->

        <!-- rent section -->

        <section class="rent_section layout_padding">
            <div class="container">
                <div class="rent_container">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('assets/static/images/landing-page/r-1.png') }}" alt="">
                        </div>
                        <div class="price">
                            <a href="">Rent Rp 600.000</a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('assets/static/images/landing-page/r-2.png') }}" alt="">
                        </div>
                        <div class="price">
                            <a href="">Rent Rp 450.000</a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('assets/static/images/landing-page/r-3.png') }}" alt="">
                        </div>
                        <div class="price">
                            <a href="">Rent Rp 350.000</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end rent section -->

        <!-- map section -->

        <section class="map_section">
            <!-- map section -->
            <div class="map_container">
            <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.2178028167946!2d106.58820534420919!3d-6.073405840329398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a01f519968677%3A0x43993e1782e7a755!2sPUJANGGA%20MANDIRI%20TRANS!5e0!3m2!1sen!2sid!4v1718588810062!5m2!1sen!2sid" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
            </div>
            <!-- end map section -->
        </section>
            <!-- end map section -->

        <!-- footer section -->
        <footer class="container-fluid footer_section">
            <p>Copyright &copy; 2024 PT Pujangga Mandiri Trans</p>
        </footer>
        <!-- footer section -->
        <!-- Scripts -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    </body>

</html>
