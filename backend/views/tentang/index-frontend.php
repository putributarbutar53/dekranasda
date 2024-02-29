<?php

use yii\helpers\Url;

$tentang = \backend\models\Tentang::find()
        ->where(['active' => 10])
        ->one();
?>

<div class="page-content bg-white">
    <!-- Blog Post -->
    <div class="section-full bg-white content-inner">
        <div class="container">
            <div class="row">
                <!--                <div class="col-lg-12 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                                    <div class="dlab-post-media m-b50" >
                        <a href=""><img src="<?= $tentang->foto ?>" alt=""></a>
                    </div>
                                </div>-->
<div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="blog-post blog-single">
                        <div class="dlab-post-info">
                            <div class="dlab-post-text text mt-0">
                                <h2><span>Tentang Dekranasda</span></h2>
                                <?= $tentang->nama ?>
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
                        <div class="widget widget-vlog wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                            <h6 class="widget-title"><span>Foto Terbaru</span></h6>
                            <div class="widget-carousel owl-carousel owl-dots-style1 owl-none owl-theme">
                                <?php
                                $findGaleriTerbaru = backend\models\Galeri::find()
                                        ->where(['active' => 10])
                                        ->orderBy(['created_at' => SORT_DESC])
                                        ->limit(3)
                                        ->all();
                                foreach ($findGaleriTerbaru as $fGT) {
                                    echo '<div class="item">
                                    <div class="post-box">
                                        <a href="' . Url::toRoute(['galeri/view-galeri', 'id' => $fGT->id]) . '" >
                                            <img src="' . Yii::getAlias('@web') . '/' . $fGT->foto_thumbnail . '" alt="" >
                                        </a>
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
</div>