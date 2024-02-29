<?php

use yii\helpers\Url;

$galeri = \backend\models\Galeri::find()
        ->where(['active' => 10])
        ->all();
$beritaCount = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_jenis_berita' => 1])
        ->all();
$artikel = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_jenis_berita' => 2])
        ->all();
$kegiatanEvent = \backend\models\Kegiatan::find()
        ->where(['active' => 10])
        ->all();
$galerifoto = backend\models\Galeri::find()
        ->where(['active' => 10])
        ->all();
$galeriVideo = \backend\models\Video::find()
        ->where(['active' => 10])
        ->all();
?>

<div class="page-content bg-white">
    <!-- Blog Post -->
<div class="section-full bg-white content-inner contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="blog-post blog-single mb-0">
                    <!--                    <div class="dlab-post-media m-b50 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                                            <img src="images/about/pic7.jpg" alt="">
                                        </div>-->
<div class="dlab-post-info">
                        <div class="dlab-post-text text">
                            <h1 class="font-weight-600">Kontak Dekranasda Kabupaten Toba</h1><br>
                            <h4 class="font-weight-600">Alamat</h4>
                            <?php
                            $kontak = backend\models\Kontak::find()->where(['active' => 10])->one();
                            echo $kontak->alamat;
                            ?>
                            <h4 class="font-weight-600">Telepon / HP / Fax</h4>
                            <?php
                            $kontak = backend\models\Kontak::find()->where(['active' => 10])->one();
                            echo $kontak->telepon;
                            ?> /
                            <?php
                            $kontak = backend\models\Kontak::find()->where(['active' => 10])->one();
                            echo $kontak->no_hp;
                            ?> / 
                            <?php
                            $kontak = backend\models\Kontak::find()->where(['active' => 10])->one();
                            echo $kontak->fax;
                            ?>
                            <br><br><h4 class="font-weight-600">Email</h4>
                            <?php
                            $kontak = backend\models\Kontak::find()->where(['active' => 10])->one();
                            echo $kontak->email;
                            ?>

                            <?php
                            $kontak = backend\models\Kontak::find()->where(['active' => 10])->one();
                            echo '<br><br><a href="' . $kontak->instagram . '" class="btn sharp radius-xl instagram"><i class="fa fa-instagram"></i></a> ';
                            echo '<a href="' . $kontak->twitter . '" class="btn sharp radius-xl twitter"><i class="fa fa-twitter"></i></a> ';
                            echo '<a href="' . $kontak->facebook . '" class="btn sharp radius-xl facebook"><i class="fa fa-facebook"></i></a> ';
                            echo '<a href="' . $kontak->youtube . '" class="btn sharp radius-xl youtube"><i class="fa fa-youtube-play"></i></a>';
                            ?>
                        </div>
                    </div>
                </div>
                <form method="post" class="dzForm" action="https://news360.dexignzone.com/xhtml/script/contact.php">
                    <div class="dzFormMsg"></div> 
                    <input type="hidden" value="Contact" name="dzToDo">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input name="nama" type="text" required="" class="form-control" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" required="" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="pesan" rows="4" class="form-control" required="" placeholder="Masukkan pesan Anda"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="<!-- Put reCaptcha Site Key -->" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                <input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <button name="submit" type="submit" value="Submit" class="btn radius-no primary">Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="side-bar sticky-top">
                    <div class="widget recent-posts-entry wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                        <h6 class="widget-title"><span>Berita Populer</span></h6>
                        <div class="widget-post-bx">
                            <?php
                            $findBeritaTerbaru = backend\models\Berita::find()
                                    ->where(['active' => 10, 'id_jenis_berita' => 1])
                                    ->orderBy(['created_at' => SORT_DESC])
                                    ->limit(3)
                                    ->all();
                            foreach ($findBeritaTerbaru as $fBT) {
                                echo '<div class="widget-post clearfix">
                                        <div class="dlab-post-media">
                                                <img src="' . Yii::getAlias('@web') . '/' . $fBT->foto . '" alt="">
                                        </div>
                                        <div class="dlab-post-info">
                                                <div class="dlab-post-meta">
                                                        <ul>
                                                                <li class="post-date">at <span>' . date("d M Y", strtotime($fBT->created_at)) . '</span></li>
                                                        </ul>
                                                </div>
                                                <h6 class="post-title"><a href="' . Url::toRoute(['berita/view-bertikel', 'id' => $fBT->id]) . '">' . $fBT->judul . '</a></h6>
                                        </div>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="widget recent-posts-entry wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                        <h6 class="widget-title"><span>Artikel Populer</span></h6>
                        <div class="widget-post-bx">
                            <?php
                            $findArtikelTerbaru = backend\models\Berita::find()
                                    ->where(['active' => 10, 'id_jenis_berita' => 2])
                                    ->orderBy(['created_at' => SORT_DESC])
                                    ->limit(3)
                                    ->all();
                            foreach ($findArtikelTerbaru as $fAT) {
                                echo '<div class="widget-post clearfix">
                                        <div class="dlab-post-media">
                                                <img src="' . Yii::getAlias('@web') . '/' . $fAT->foto . '" alt="">
                                        </div>
                                        <div class="dlab-post-info">
                                                <div class="dlab-post-meta">
                                                        <ul>
                                                                <li class="post-date">at <span>' . date("d M Y", strtotime($fAT->created_at)) . '</span></li>
                                                        </ul>
                                                </div>
                                                <h6 class="post-title"><a href="' . Url::toRoute(['berita/view-bertikel', 'id' => $fAT->id]) . '">' . $fAT->judul . '</a></h6>
                                        </div>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="widget widget_categories wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <h6 class="widget-title"><span>Info Publik</span></h6>
                        <ul>
                            <li><a href="<?= Url::toRoute(['berita/index-berita', 'id_jenis_berita' => 1]) ?>">Berita </a> <span class="badge"><?= count($beritaCount) ?></span> </li>
                            <li><a href="<?= Url::toRoute(['berita/index-berita', 'id_jenis_berita' => 2]) ?>">Artikel </a> <span class="badge"><?= count($artikel) ?></span></li>
                            <li><a href="<?= Url::toRoute(['kegiatan/index-kegiatan']) ?>">Kegiatan/Event </a> <span class="badge"><?= count($kegiatanEvent) ?></span></li>
                            <li><a href="<?= Url::toRoute(['galeri/index-galeri']) ?>">Galeri Foto </a> <span class="badge"><?= count($galerifoto) ?></span></li>
                            <li><a href="<?= Url::toRoute(['video/index-video']) ?>">Galeri Video </a> <span class="badge"><?= count($galeriVideo) ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Post End -->
<!-- Instagram Post Carousel -->
<div class="section-full insta-post-carousel owl-carousel owl-none wow fadeIn lightgallery" data-wow-duration="2s" data-wow-delay="0.6s">
    <div class="item">
        <span data-exthumbimage="images/blog/card/small/pic1.jpg" data-src="images/blog/card/full-img/pic1.jpg" class="check-km dlab-img-effect" title="Title Come Here">
            <img src="images/blog/card/pic1.jpg" alt="">
        </span>
    </div>
    <div class="item">
        <span data-exthumbimage="images/blog/card/small/pic2.jpg" data-src="images/blog/card/full-img/pic2.jpg" class="check-km dlab-img-effect" title="Title Come Here">
            <img src="images/blog/card/pic2.jpg" alt="">
        </span>
    </div>
    <div class="item">
        <span data-exthumbimage="images/blog/card/small/pic3.jpg" data-src="images/blog/card/full-img/pic3.jpg" class="check-km dlab-img-effect" title="Title Come Here">
            <img src="images/blog/card/pic3.jpg" alt="">
        </span>
    </div>
    <div class="item">
        <span data-exthumbimage="images/blog/card/small/pic4.jpg" data-src="images/blog/card/full-img/pic4.jpg" class="check-km dlab-img-effect" title="Title Come Here">
            <img src="images/blog/card/pic4.jpg" alt="">
        </span>
    </div>
    <div class="item">
        <span data-exthumbimage="images/blog/card/small/pic5.jpg" data-src="images/blog/card/full-img/pic5.jpg" class="check-km dlab-img-effect" title="Title Come Here">
            <img src="images/blog/card/pic5.jpg" alt="">
        </span>
    </div>
    <div class="item">
        <span data-exthumbimage="images/blog/card/small/pic6.jpg" data-src="images/blog/card/full-img/pic6.jpg" class="check-km dlab-img-effect" title="Title Come Here">
            <img src="images/blog/card/pic6.jpg" alt="">
        </span>
    </div>
    <div class="item">
        <span data-exthumbimage="images/blog/card/small/pic7.jpg" data-src="images/blog/card/full-img/pic7.jpg" class="check-km dlab-img-effect" title="Title Come Here">
            <img src="images/blog/card/pic7.jpg" alt="">
        </span>
    </div>
</div>
<!-- Blog Card Carousel End -->
</div>