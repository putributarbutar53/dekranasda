<?php

use yii\helpers\Url;

$programKerja = backend\models\ProgramKerja::find()
        ->where(['active' => 10])
        ->one();
?>

<div class="page-content bg-white">
    <!-- Blog Post -->
    <div class="section-full bg-white content-inner"style="padding-top: 25px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12" >
                    <div class="blog-post blog-single">
                        <div class="dlab-post-info">
                            <div class="dlab-post-text text mt-0">
                                <h2><span>Program Kerja</span></h2>
                                <?= $programKerja->isi ?>
                            </div>
                            <ul class="social-icon">
                                <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="side-bar sticky-top">
                        <div class="widget widget-ads wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                            <div class="widget-post">
                                <img alt="" src="foto/logo.png">
                            </div>
                        </div>                        
                        <div class="widget recent-posts-entry wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                            <h6 class="widget-title"><span>Kegiatan Terbaru</span></h6>
                            <div class="widget-post-bx">
                                <?php
                                $findKegiatanTerbaru = backend\models\Kegiatan::find()
                                        ->where(['active' => 10])
                                        ->orderBy(['created_at' => SORT_DESC])
                                        ->limit(3)
                                        ->all();
                                foreach ($findKegiatanTerbaru as $fKT) {
                                    echo '<div class="widget-post clearfix">
                                        <div class="dlab-post-media">
                                                <img src="' . Yii::getAlias('@web') . '/' . $fKT->foto . '" alt="">
                                        </div>
                                        <div class="dlab-post-info">
                                                <div class="dlab-post-meta">
                                                        <ul>
                                                                <li class="post-date">at <span>' . date("d M Y", strtotime($fKT->created_at)) . '</span></li>
                                                        </ul>
                                                </div>
                                                <h6 class="post-title"><a href="' . Url::toRoute(['kegiatan/view-kegiatan', 'id' => $fKT->id]) . '">' . $fKT->judul . '</a></h6>
                                        </div>
                                </div>';
                                }
                                ?>
                            </div>
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