<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="<?= base_url() . 'assetss/img/favicon.png' ?>" rel="icon">
    <link href="<?= base_url() . 'assetss/img/apple-touch-icon.png' ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?= base_url() . 'assetss/lib/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?= base_url() . 'assetss/lib/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assetss/lib/animate/animate.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assetss/lib/ionicons/css/ionicons.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assetss/lib/owlcarousel/assets/owl.carousel.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url() . 'assetss/lib/lightbox/css/lightbox.min.css' ?>" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?= base_url() . 'assetss/css/style.css' ?>" rel="stylesheet">
</head>

<body>

    <!--==========================
    Header
  ============================-->
    <header id="header">
        <div class="container-fluid">

            <div id="logo" class="pull-left">
                <h1><img src="assets/image/logo.jpg" alt="" height="42px" width="38px">&nbsp;<a href="#intro"
                        class="scrollto">Desa Taman Sari</a></h1>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#intro">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="<?= site_url('login') ?>">Login</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->

    <!--==========================
    Intro Section
  ============================-->
    <section id="intro">
        <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active">
                        <div class="carousel-background"><img src="assets/image/pegawai.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <a href="#featured-services"></a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-background"><img src="assets/image/2.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <a href="#featured-services"></a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-background"><img src="assets/image/3.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <a href="#featured-services"></a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-background"><img src="assets/image/4.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <a href="#featured-services"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </section><!-- #intro -->



    <!--==========================
      About Us Section
    ============================-->

    <section id="about">
        <div class="container">

            <header class="section-header">
                <h3>E-Musrenbang</h3>
                <p class="text-center">Sistem ini digunakan untuk mendukung pelaksanaan Musrenbang (Musyawarah
                    Perencanaan Pembangunan) dalam rangka penyusunan RKPD tingkat desa. E-Musrenbang dapat diakses oleh
                    Masyarakat, Dusun dan
                    Desa</p>
            </header>

        </div>
    </section><!-- #about -->


    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn">
        <div class="container text-center">
            <h3>RKP</h3>
            <p>
                RKP (Rencana Pembangunan Pemerintah) merupakan rencana pembangunan yang terdiri dari usulan semua
                dusun yang berada di Desa Taman Sari yang telah disetujui oleh kepala Desa Taman Sari.
            </p>
            <a target="_blank" class="btn btn-primary center-block" href="<?= site_url() . '/InputData/test2' ?>"
                style="text-align: center">EXPORT TO EXCEL</a>
        </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">

            <div class="section-header">
                <h3>Contact Us</h3>
            </div>

            <div class="row contact-info">

                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="ion-ios-location-outline"></i>
                        <h3>Address</h3>
                        <address>Taman Sari, Gn. Sari, <br>Kabupaten Lombok Barat, <br> Nusa Tenggara Barat </address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>Phone Number</h3>
                        <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="ion-ios-email-outline"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- #contact -->

    </main>

    <!--==========================
    Footer
  ============================-->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright E-Musrenbang Desa Taman Sari <?= date('Y'); ?>
            </div>
        </div>
    </footer><!-- #footer -->

    <!-- JavaScript Libraries -->
    <script src="<?= base_url() . 'assetss/lib/jquery/jquery.min.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/jquery/jquery-migrate.min.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/easing/easing.min.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/superfish/hoverIntent.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/superfish/superfish.min.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/wow/wow.min.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/waypoints/waypoints.min.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/counterup/counterup.min.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/owlcarousel/owl.carousel.min.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/isotope/isotope.pkgd.min.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/lightbox/js/lightbox.min.js' ?>"></script>
    <script src="<?= base_url() . 'assetss/lib/touchSwipe/jquery.touchSwipe.min.js' ?>"></script>
    <!-- Contact Form JavaScript File -->
    <script src="<?= base_url() . 'assetss/contactform/contactform.js' ?>"></script>

    <!-- Template Main Javascript File -->
    <script src="<?= base_url() . 'assetss/js/main.js' ?>"></script>

</body>

</html>