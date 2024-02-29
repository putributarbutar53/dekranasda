<?php
$findGaleriChild = \backend\models\GaleriChild::find()
        ->where(['id_galeri' => $model->id, 'active' => 10])
        ->all();
?>

<div class="page-content bg-white">
    <!-- Product Section -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="section-head text-center">
                <span>Galeri Foto</span>
            </div>            
            <ul id="masonry" class="dlab-gallery-listing row m-b0 gallery-grid-4 p-l0 mfp-gallery">
                <?php
                foreach ($findGaleriChild as $fGC) {
                    echo '<li class="card-container col-lg-4 col-md-6 col-sm-12 m-b20 accessories wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="item-box">
                        <div class="item-img">
                            <img src="' . Yii::getAlias('@web') . '/' . $fGC->foto . '" alt="" style="height:300px;">
                            <div class="item-info-in">
                            <a href="' . $fGC->foto . '" class="lightbox-image" data-fancybox="gallery" target="_blank><i class="icon-Zoom"></i>Lihat</a>
                            </div>
                        </div>
                    </div>
                </li>';
                }
                ?>                
            </ul>
        </div>
    </div>
    <!-- Product Section End -->
</div>