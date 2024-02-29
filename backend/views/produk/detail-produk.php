<?php
$user = \common\models\User::find()
        ->where(['id' => $model->created_by])
        ->one();
?>
<!-- Content -->
<div class="page-content bg-white">
    <!-- Product details -->
    <div class="container content-inner-1 woo-entry">
        <div class="row">
            <div class="col-md-5 col-lg-7">
                <div class="product-gallery">
                    <div class="dlab-thum-bx">
                        <img src="<?= Yii::getAlias('@web') . '/' . $model->foto ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-5">
                <form method="post" class="cart sticky-top">
                    <div class="dlab-post-title">
                        <h3 class="post-title"><?= $model->nama ?>  </h3>
                        <h4 class="product-price">Rp. <?= $model->harga ?></h4>
                    </div>
                    <p class="m-b10"><?= $model->deskripsi ?></p>
                    <div class="dlab-divider bg-gray tb15"><i class="icon-dot c-square"></i></div>
                    <div class="shop-item-tage mb-2">
                        <span>Ukuran: </span>
                        <a><?= $model->ukuran ?></a>
                    </div>
                    <div class="shop-item-tage mb-2">
                        <span>Warna: </span>
                        <a><?= $model->warna ?></a>
                    </div>
                    <div class="shop-item-tage mb-2">
                        <span>Motif: </span>
                        <a><?= $model->motif ?></a>
                    </div>
                    <div class="shop-item-tage mb-2">
                        <span>Kategori: </span>
                        <a><?= $model->kategori->nama ?></a>
                    </div>
                    <div class="shop-item-tage mb-2">
                        <span>Penjual: </span>
                        <a><?= $model->penjual->nama ?></a>
                    </div>
                    <div class="shop-item-tage mb-2">
                        <span>No.Hp: </span>
                        <a><?= $model->penjual->no_hp ?></a>
                    </div>
                    <div class="col-xs-4 btn btn-primary">
                        <a href="https://api.whatsapp.com/send?phone=<?= $model->penjual->no_hp ?>&text=Hallo%20Kak,%20Saya%20tertarik%20untuk%20membeli%20produk%20ini,%20bisa%20dibantu%20untuk%20proses%20pemesanannya?" target="_blank">Pesan Sekarang</a>
                    </div>
                    <!--                    <ul class="social-icon m-b0">
                                            <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li>
                                        </ul>-->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Product Section -->