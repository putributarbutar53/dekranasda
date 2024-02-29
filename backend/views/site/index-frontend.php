<?php
$slider = backend\models\Slider::find()
        ->where(['active' => 10])
        ->all();

$findBerita = \backend\models\Berita::find()
        ->where(['active' => 10])
        ->orderBy(['created_at' => SORT_DESC])
        ->limit(3)
        ->all();

$findKegiatan = \backend\models\Kegiatan::find()
        ->where(['active' => 10])
        ->orderBy(['created_at' => SORT_DESC])
        ->limit(3)
        ->all();

use yii\helpers\Url;
?>

<!-- Content -->
<div class="page-content bg-white">
    <div class="section-full trending-post-sync wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
        <div class="container-fluid p-lr0">
            <div id="sync1" class="owl-carousel owl-theme owl-none owl-dots-none">
                <?php
                foreach ($slider as $sl) {
                echo'<div class = "item">
                    <div class="dlab-box">
                        <div class="dlab-thum-bx">
                            <img src="' . Yii::getAlias('@web') . '/' . $sl->foto . '" alt="Profile Pic" style="width:1170px; height:auto; max-height:680px;min-height:200px;">
                        </div>
                    </div>
                </div>';
            }
            ?>
            </div>
            <div id="sync2" class="owl-carousel owl-theme owl-none owl-dots-none">
                <?php
                foreach ($slider as $sl){
                echo '<div class="item">
                    <div class="trending-post style1" style="height:170px;">
                        <div class="dlab-post-info">
                            <div class="dlab-post-header">
                                <h6 class="post-title"><a href="">' . $sl->keterangan . '</a></h6>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>
            </div>
        </div>
    </div>
    <!-- Trending Post End -->
    <!-- Category -->
    <div class="section-full bg-gray content-inner-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="category-owl-2 owl-carousel owl-btn-center-lr owl-none">
                        <div class="item">
                            <div class="category-box">
                                <div class="category-media" >
                                    <img src="foto/tentang_kami.jpg" alt="Travel">
                                </div>
                                <div class="category-info">
                                    <a href="<?= Url::toRoute(['tentang/index-frontend']) ?>" target="_blank"  class="category-title">Tentang Kami</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-box">
                                <div class="category-media">
                                    <img src="foto/produk_kami.jpg" alt="Travel">
                                </div>
                                <div class="category-info">
                                    <a href="<?= Url::toRoute(['produk/index-produk']) ?>" target="_blank" class="category-title">Produk Kami</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="category-box">
                                <div class="category-media">
                                    <img src="foto/anggota_kami.jpg" alt="Travel">
                                </div>
                                <div class="category-info">
                                    <a href="<?= Url::toRoute(['penjual/index-penjual']) ?>" target="_blank" class="category-title">Anggota Kami</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category End -->

    <!--Berita dan Artikel-->
    <div class="section-full bg-white content-inner-3">
        <div class="container">
            <div class="section-head text-center">
                <span>Berita dan Artikel</span>
            </div>
            <div class="row">
                <?php
                foreach ($findBerita as $fb) {
                    $user = \common\models\User::find()
                            ->where(['id' => $fb->created_by])
                            ->one();
                    echo'
                <div class="col-md-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="blog-card blog-grid">
                        <div class="dlab-post-media">
                             <img src="' . Yii::getAlias('@web') . '/' . $fb->foto . '" alt="Profile Pic" style="height:213px" >
                        </div>
                        <div class="blog-card-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-category"><a href="javascript:void(0);">' . $user->username . ',</li>
                                    <li class="post-date"> <span>' . date("d M Y", strtotime($fb->created_at)) . '</span></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="' . Url::toRoute(['berita/view-bertikel', 'id' => $fb->id]) . '">' . $fb->judul . '</a></h4>
                            <div class="dlab-feed-meta">
                                <ul>
                                    <li class="post-view"><a href="javascript:void(0);"><i class="fa fa-eye"></i><span>' . $fb->jumlah_view . '</span></a></li>
                                    <li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
                                        <ul>
                                            <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>';
}
                ?>
            </div>
        </div>
    </div>
    <!--Berita dan Artikel End-->

    <!--Kegiatan-->
    <div class="section-full bg-white content-inner-3">
        <div class="container">
            <div class="section-head text-center">
                <span>Kegiatan</span>
            </div>
            <div class="row">
                <?php
                foreach ($findKegiatan as $fk) {
                    $user = \common\models\User::find()
                            ->where(['id' => $fk->created_by])
                            ->one();
                    echo'
                <div class="col-md-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="blog-card blog-grid">
                        <div class="dlab-post-media">
                             <img src="' . Yii::getAlias('@web') . '/' . $fk->foto . '" alt="Profile Pic" style="height:213px">
                        </div>
                        <div class="blog-card-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-category"><a href="javascript:void(0);">' . $user->username . ',</li>
                                    <li class="post-date"> <span>' . date("d M Y", strtotime($fk->created_at)) . '</span></li>
                                </ul>
                            </div>
                            <h4 class="title"><a href="' . Url::toRoute(['kegiatan/view-kegiatan', 'id' => $fk->id]) . '">' . $fk->judul . '</a></h4>
                            <div class="dlab-feed-meta">
                                <ul>
                                    <li class="post-view"><a href="javascript:void(0);"><i class="fa fa-eye"></i><span>' . $fk->jumlah_view . '</span></a></li>
                                    <li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
                                        <ul>
                                            <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>';
}
                ?>
            </div>
        </div>
    </div>
    <!--Kegiatan End-->
</div>




    <!-- Instagram Post Carousel -->

    <!-- Blog Card Carousel End -->
</div>
<!-- Content END-->