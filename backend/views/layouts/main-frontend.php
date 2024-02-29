<?php

use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">
    <script>
    $(document).ready(function(){
                $('html').animate({scrollTop: 0}, 1);
            $('body').animate({scrollTop: 0}, 1);
        });
    </script>
    <!-- Mirrored from news360.dexignzone.com/xhtml/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jun 2021 09:58:24 GMT -->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="" />
        <meta name="author" content="" />
        <meta name="robots" content="" />
        <meta name="description" content="PKK Kabupaten TOBA"/>
        <meta property="og:title" content="PKK Kabupaten TOBA" />
        <meta property="og:description" content="PKK Kabupaten TOBA" />
        <meta property="og:image" content="" />
        <meta name="format-detection" content="telephone=no">

        <!-- FAVICONS ICON -->
        <link rel="icon" href="foto/logo-baru.ico" type="" />
        <link rel="shortcut icon" type="" href="foto/logo-baru.png" />

        <!-- PAGE TITLE HERE -->
        <title>Dekranasda Kabupaten TOBA</title>

        <!-- MOBILE SPECIFIC -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="xhtml/js/html5shiv.min.js"></script>
        <script src="xhtml/js/respond.min.js"></script>
        <![endif]-->

        <!-- STYLESHEETS -->
        <link rel="stylesheet" type="text/css" href="xhtml/css/plugins.css">
        <link rel="stylesheet" type="text/css" href="xhtml/css/style.css">
        <link rel="stylesheet" type="text/css" href="xhtml/css/templete.css">
        <link class="skin" rel="stylesheet" type="text/css" href="xhtml/css/skin/skin-1.css">

    </head>
    <body id="bg">
        <div class="page-wraper">
            <div id="loading-area"></div>
            <div class="modal fade subscribe-modal-bx" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content subscribe-form">
                        <div class="modal-header">
                            <div class="sub-title">

                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="https://news360.dexignzone.com/xhtml/script/mailchamp.php" method="post" class="dzSubscribe row align-items-center">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input name="dzName" required="required" type="text" class="form-control" placeholder="Your Name ">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group m-b0">
                                        <button name="submit" value="Submit" type="submit" class="btn secondry radius-no btn-block">Subscribe</button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="dzSubscribeMsg"></div>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- header -->
            <header class="site-header mo-left header-full header">
                <!-- main header -->
                <div class="sticky-header main-bar-wraper navbar-expand-lg">
                    <div class="main-bar clearfix ">
                        <div class="container-fluid">
                            <!-- website logo -->
                            <div class="logo-header mostion" style="width: 300px;">
                                <a href="<?= Url::toRoute(['site/index']) ?>"><img src="foto/logo.png" alt="" id="idLogoDek"></a>
                            </div>

                            <!-- nav toggle button -->
                            <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>


                            <!-- Quik search -->
                            <div class="dlab-quik-search">
                                <form action="#">
                                    <input name="search" value="" type="text" class="form-control" placeholder="Search...">
                                    <span id="quik-search"><i class="ti-search"></i></span>
                                </form>
                                <span class="search-remove" id="quik-search-remove"><i class="ti-close"></i></span>
                            </div>

                            <!-- main nav -->
                            <div class="header-nav navbar-collapse collapse justify-content-center" id="navbarNavDropdown">
                                <div class="logo-header" style="background-color: #41c8f7;">
                                    <a href="<?= Url::toRoute(['/site/index']) ?>"><img src="foto/logo.png" alt=""></a>
                                </div>
                                <ul class="nav navbar-nav">
                                    <li class="active">
                                        <a href="<?= Url::toRoute(['/site/index']) ?>">BERANDA</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">PROFIL<i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= Url::toRoute(['/visi/index-frontend']) ?>">VISI & MISI</a></li>
                                            <li><a href="<?= Url::toRoute(['/tentang/index-frontend']) ?>">TENTANG KAMI</a></li>
                                            <li><a href="<?= Url::toRoute(['/program-kerja/index-frontend']) ?>">PROGRAM KERJA</a></li>
                                            <li><a href="<?= Url::toRoute(['/struktur-organisasi/index-frontend']) ?>">STRUKTUR ORGANISASI</a></li>
                                            <li><a href="<?= Url::toRoute(['/arti-lambang/index-frontend']) ?>">ARTI LAMBANG</a></li>
                                            <li><a href="<?= Url::toRoute(['/tujuan-sasaran/index-frontend']) ?>">TUJUAN & SASARAN</a></li>
                                            <li><a href="<?= Url::toRoute(['/mars/index-frontend']) ?>">MARS DEKRANASDA</a></li>
                                        </ul>
                                    </li>                                    
                                    <li>
                                        <a href="javascript:void(0);">INFO PUBLIK<i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= Url::toRoute(['/berita/index-berita', 'id_jenis_berita' => 1]) ?>">BERITA</a></li>
                                            <li><a href="<?= Url::toRoute(['/berita/index-berita', 'id_jenis_berita' => 2]) ?>">ARTIKEL</a></li>
                                            <li><a href="<?= Url::toRoute(['/kegiatan/index-kegiatan']) ?>">KEGIATAN/EVENT</a></li>
                                            <li><a href="<?= Url::toRoute(['/galeri/index-galeri']) ?>">GALERI FOTO</a></li>
                                            <li><a href="<?= Url::toRoute(['/video/index-video']) ?>">GALERI VIDEO</a></li>
                                            <li><a href="<?= Url::toRoute(['/file-download/index-file-download']) ?>">FILE DOWNLOAD</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">PERAJIN<i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= Url::toRoute(['/produk/index-produk']) ?>">PRODUK KAMI</a></li>
                                            <li><a href="<?= Url::toRoute(['/penjual/index-penjual']) ?>">ANGGOTA KAMI</a></li>
                                        </ul>
                                    </li>                                    
                                    <li>
                                        <a href="<?= Url::toRoute(['/kontak/index-kontak']) ?>">KONTAK</a>
                                    </li>
                                    <li>
                                        <?php
                                    if (Yii::$app->user->isGuest) {
                                        ?>
                                    <li><a href="<?= Url::toRoute(['site/login']) ?>" >MASUK</a></li>
                                        <?php
                                    } else {
                                        ?>
                                    <li><a href="<?= Url::toRoute(['site/index-backend']) ?>" >ADMIN</a></li>
                                        <?php
                                    }
                                    ?>
                        <!--<a id="quik-search-btn" href="javascript:;"><i class="ti-search m-r10"></i><span>Search</span></a>-->
                                </li>
                                    <li>
                                        <a href="<?= Url::toRoute(['site/daftar-anggota']) ?>" class="btn secondry radius-no btn-block">DAFTAR ANGGOTA</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- header END -->
            <?= $content ?>
            <!-- Footer -->
            <footer class="site-footer wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <ul class="footer-link m-b0 p-l0">
                                    <li><a href="<?= Url::toRoute(['/site/index']) ?>">BERANDA</a>  </li>
                                    <li><a href="<?= Url::toRoute(['/kontak/index-kontak']) ?>">KONTAK</a></li>
                                    <?php
                                    if (Yii::$app->user->isGuest) {
                                        ?>
                                        <li><a href="<?= Url::toRoute(['site/login']) ?>" >MASUK</a></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li><a href="<?= Url::toRoute(['site/index-backend']) ?>" >ADMIN</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <div class="footer-logo">
                                    <a href="<?= Url::toRoute(['/site/index']) ?>"><img src="foto/logo2.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 align-self-center">
                                <ul class="social-icon m-b0 p-l0">
                                    <?php
                                    $kontak = backend\models\Kontak::find()->where(['active' => 10])->one();
                                    ?>
                                    <li><a href="<?= $kontak['instagram'] ?>" class="btn sharp radius-xl instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="<?= $kontak['twitter'] ?>" class="btn sharp radius-xl twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?= $kontak['facebook'] ?>" class="btn sharp radius-xl facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?= $kontak['youtube'] ?>" class="btn sharp radius-xl youtube"><i class="fa fa-youtube-play"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <p>© 2021. DEKRANASDA KABUPATEN TOBA</p>
                        <p>DEVELOPED BY DISKOMINFO KABUPATEN TOBA</p>
                    </div>
                </div>
            </footer>
            <!-- Footer END-->
            <button class="scroltop fa fa-chevron-up" ></button>
        </div>
        <!-- JAVASCRIPT FILES ========================================= -->
        <script src="xhtml/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
        <script src="xhtml/plugins/wow/wow.js"></script><!-- WOW JS -->
        <script src="xhtml/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
        <script src="xhtml/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
        <script src="xhtml/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
        <script src="xhtml/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
        <script src="xhtml/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
        <script src="xhtml/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
        <script src="xhtml/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
        <script src="xhtml/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
        <script src="xhtml/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
        <script src="xhtml/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
        <script src="xhtml/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
        <script src="xhtml/plugins/scroll/scrollbar.min.js"></script><!-- Scroll Bar -->
        <script src="xhtml/plugins/lightgallery/js/lightgallery-all.min.js"></script><!-- Lightgallery -->
        <script src="xhtml/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
        <script src="xhtml/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS -->
        <script src="xhtml/js/dz.ajax.js"></script><!-- CONTACT JS  -->
        <script>

            $(document).ready(function () {

                var sync1 = $("#sync1");
                var sync2 = $("#sync2");
                var slidesPerPage = 4; //globaly define number of elements per page
                var syncedSecondary = true;

                sync1.owlCarousel({
                    items: 2,
                    slideSpeed: 2000,
                    nav: true,
                    autoplay: false,
                    center: true,
                    autoWidth: true,
                    dots: false,
                    loop: true,
                    responsiveRefreshRate: 200,
                    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                    responsive: {
                        0: {
                            items: 1,
                            autoWidth: false,
                            stagePadding: 30
                        },
                        767: {
                            autoWidth: false
                        },
                        1200: {
                            items: 2
                        }
                    }
                })

                        .on('changed.owl.carousel', syncPosition);

                sync2.on('initialized.owl.carousel', function () {
                    sync2.find(".owl-item").eq(0).addClass("current");
                }).owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: false,
                    margin: 0,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsive: {
                        0: {
                            items: 1,
                            stagePadding: 30
                        },
                        480: {
                            items: 2
                        },
                        768: {
                            items: 3
                        },
                        1024: {
                            items: 4
                        },
                        1400: {
                            items: 4
                        }
                    }
                }).on('changed.owl.carousel', syncPosition2);

                function syncPosition(el) {
                    //if you set loop to false, you have to restore this next line
                    //var current = el.item.index;

                    //if you disable loop you have to comment this block
                    var count = el.item.count - 1;
                    var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                    if (current < 0) {
                        current = count;
                    }
                    if (current > count) {
                        current = 0;
                    }

                    //end block

                    sync2
                            .find(".owl-item")
                            .removeClass("current")
                            .eq(current)
                            .addClass("current");
                    var onscreen = sync2.find('.owl-item.active').length - 1;
                    var start = sync2.find('.owl-item.active').first().index();
                    var end = sync2.find('.owl-item.active').last().index();

                    if (current > end) {
                        sync2.data('owl.carousel').to(current, 100, true);
                    }
                    if (current < start) {
                        sync2.data('owl.carousel').to(current - onscreen, 100, true);
                    }
                }

                function syncPosition2(el) {
                    if (syncedSecondary) {
                        var number = el.item.index;
                        sync1.data('owl.carousel').to(number, 100, true);
                    }
                }

                sync2.on("click", ".owl-item", function (e) {
                    e.preventDefault();
                    var number = $(this).index();
                    //sync1.data('owl.carousel').to(number, 300, true);

                    sync1.data('owl.carousel').to(number, 300, true);

                });
            });            
        </script>
    </body>

    <!-- Mirrored from news360.dexignzone.com/xhtml/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jun 2021 09:58:26 GMT -->
</html>
