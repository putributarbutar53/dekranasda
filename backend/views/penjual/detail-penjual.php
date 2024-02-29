<?php

use yii\helpers\Url;
?>
<!-- Content -->
<div class="page-content bg-white">
    <!-- Blog Post -->
    <div class="section-full bg-gray content-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="bg-white p-a30 m-b30">
                                <div class="author-profile-info ">
                                    <div class="">
                                        <a href="javascript:void(0);">
                                            <img src="<?= Yii::getAlias('@web') . '/' . $model->foto ?>" alt="Profile Pic" width="300" height="300">
                                        </a>
                                    </div>
                                    <div class="author-profile-content"><br>
                                        <h6 class="title"><?= $model->nama ?></h6>
                                        <p class="fa fa-map-marker">  <?= $model->kecamatan->nama ?></p><br>
                                        <p class="fa fa-phone-square">  <?= $model->no_hp ?></p>
                                        <ul class="social-icon m-b0">
                                            <li><a href="<?= $model->url_instagram ?>" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="<?= $model->url_twitter ?>" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?= $model->url_facebook ?>" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="<?= $model->url_youtube ?>" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="section-head text-center">
                            <span>Produk</span>
                        </div>
                        <?php
                        $findKategoriProduk = \backend\models\MasterKategoriProduk::find()
                                ->where(['active' => 10])
                                ->orderBy(['created_at' => SORT_DESC])
                                ->all();
                        $findProduk = \backend\models\Produk::find()
                                ->where(['active' => 10, 'id_penjual' => $model->id])
                                ->all();
                        ?>

                        <div class="row filter-bx m-lr0 ">
                            <div class="col-lg-12 col-md-12 align-self-center">
                                <div class="site-filters clearfix">
                                    <ul class="filters p-l0" data-toggle="buttons">
                                        <?php
                                        foreach ($findKategoriProduk as $fKP) {
                                            echo'<li data-filter="' . $fKP->id . '" class="btn-link active">
                                <input type="radio">
                                <a href="javascript:void(0);" class=""><span>' . $fKP->nama . '</span></a> </li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul id="masonry" class="dlab-gallery-listing row m-b0 gallery-grid-4 p-l0 mfp-gallery">
                            <?php
                            foreach ($findProduk as $fP) {
                                echo'<li class="card-container col-lg-4 col-md-6 col-sm-12 m-b20 ' . $fP->id_kategori . ' wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="item-box">
                        <div class="item-img">
                            <img src="' . $fP->foto . '" alt="" style="height:250px;">
                            <div class="item-info-in">
                                <a href="' . Url::toRoute(['produk/detail-produk', 'id' => $fP->id]) . '" class="quick-btn">Lihat Selengkapnya</a>
                            </div>
                        </div>
                        <div class="item-info">
                            <h6 class="item-title"><a href="' . Url::toRoute(['produk/detail-produk', 'id' => $fP->id]) . '">' . $fP->nama . '</a><span class="item-price">Rp. ' . $fP->harga . '</span></h6>
                        </div>
                    </div>
                </li>';
                            }
                            ?>

                    </div>
                    <!-- Pagination start -->
                    <!-- Pagination End -->
                </div>
                <!--                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="side-bar sticky-top">
                        <div class="widget recent-posts-entry wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                            <h6 class="widget-title"><span>Berita Terbaru</span></h6>
                            <div class="widget-post-bx">
                                <?php
                                $findBeritaTerbaru = backend\models\Berita::find()
                                ->where(['active' => 10, 'id_jenis_berita' => 1])
                                ->orderBy(['created_at' => SORT_DESC])
                                ->limit(3)
                                ->all();
                                foreach ($findBeritaTerbaru as $fBT) {
                                    echo'<div class="widget-post clearfix">
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
                    </div>
                                </div>-->
            </div>
        </div>
    </div>
    <!-- Blog Post End -->
    <!-- Blog Card Carousel End -->
</div>
<!-- Content END-->