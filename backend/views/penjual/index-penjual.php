<?php

use yii\helpers\Url;
?>
<!-- Content -->
<div class="page-content bg-white">
    <!-- Product Section -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="section-head text-center">
                <span>Anggota</span>
            </div>
            <?php
            $findKecamatan = \backend\models\MasterKecamatan::find()
                    ->where(['active' => 10])
                    ->orderBy(['created_at' => SORT_DESC])
                    ->all();
            $findPenjual = \backend\models\Penjual::find()
                    ->where(['active' => 10])
                    ->all();
            ?>

            <div class="row filter-bx m-lr0 ">
                <div class="col-lg-12 col-md-12 align-self-center">
                    <div class="site-filters clearfix">
                        <ul class="filters p-l0" data-toggle="buttons">
                            <?php
                            foreach ($findKecamatan as $fK) {
                                echo'<li data-filter="' . $fK->id . '" class="btn-link active">
                                <input type="radio">
                                <a href="javascript:void(0);" class=""><span>' . $fK->nama . '</span></a> </li>';
}
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <ul id="masonry" class="dlab-gallery-listing row m-b0 gallery-grid-4 p-l0 mfp-gallery">
                <?php
                foreach ($findPenjual as $fP) {
                    echo'<li class="card-container col-lg-4 col-md-6 col-sm-12 m-b20 ' . $fP->id_kecamatan . ' wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="item-box">
                        <div class="item-img">
                            <img src="' . $fP->foto . '" alt="" style="height:250px;">
                        </div>
                        <div class="item-info">
                            <h6 class="item-title"><a href="' . Url::toRoute(['penjual/detail-penjual', 'id' => $fP->id]) . '">' . $fP->nama . '</a></h6>
                        </div>
                    </div>
                </li>';
                }
                ?>

        </div>
    </div>
    <!-- Product Section End -->
    <!-- Instagram Post Carousel -->
    <!--    <div class="section-full insta-post-carousel owl-carousel owl-none wow fadeIn lightgallery" data-wow-duration="2s" data-wow-delay="0.6s">
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
        </div>-->
<!-- Blog Card Carousel End -->
</div>
<!-- Content END-->