<?php

use yii\helpers\Url;
use kartik\grid\GridView;

$galerivideos = \backend\models\Video::find()
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
    <div class="section-full bg-white content-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="search-info m-b50">
                                <div class="d-flex m-b10">
                                    <h2 class="search-result">File Download</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="blog-card blog-grid">
                                <div class="dlab-post-info">
                                    <?php
                                    echo GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'filterModel' => $searchModel,
                                        'options' => ['style' => 'width:100%'],
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                            // 'id',
                                            [
                                                'attribute' => 'nama',
                                                'headerOptions' => ['style' => 'width:88%'],
                                            ],
                                            [
                                                'label' => 'File Download',
                                                'attribute' => 'file',
                                                'format' => 'raw',
                                                'headerOptions' => ['style' => 'width:12%'],
                                                'value' => function ($model) {
                                                    return '<a href=' . $model->file . ' class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download"></i></a>';
                                                }
                                            ],
                                        ],
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
</div>