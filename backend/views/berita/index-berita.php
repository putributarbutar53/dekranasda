<?php

use yii\helpers\Url;

$berita = \backend\models\Berita::find()
        ->where(['active' => 10, 'id_jenis_berita' => $id_jenis_berita])
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

$kategori = backend\models\MasterJenisBerita::findOne($id_jenis_berita);
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
                                    <p class="search-name">Kategori:</p><h2 class="search-result"><?= $kategori->nama ?></h2>
                                </div>
                                <p class="found-posts m-b0">Ditemukan <?= count($berita) . ' ' . $kategori->nama ?></p>
                            </div>
                        </div>
                        <?php
                        foreach ($berita as $beritas) {
                            echo '<div class="col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="blog-card blog-grid">
                                <div class="dlab-post-media">
                                    <img src="' . Yii::getAlias('@web') . '/' . $beritas->foto . '" alt="" style="height:240px;"/>
                                </div>
                                <div class="blog-card-info">
                                    <div class="dlab-post-meta">
                                        <ul>                                            
                                            <li class="post-date">at <span>' . date("d M Y", strtotime($beritas->created_at)) . '</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="title"><a href="' . Url::toRoute(['berita/view-bertikel', 'id' => $beritas->id]) . '">' . $beritas->judul . '</a></h4>
                                    <div class="dlab-feed-meta">
                                        <ul>                                            
                                            <li class="post-view"><a href="javascript:void(0);"><i class="fa fa-eye"></i><span>' . $beritas->jumlah_view . '</span></a></li>
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
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="side-bar sticky-top">                        
                        <div class="widget recent-posts-entry wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                            <h6 class="widget-title"><span><?= $kategori->nama ?> Populer</span></h6>
                            <div class="widget-post-bx">
                                <?php
                                $findBeritaTerbaru = backend\models\Berita::find()
                                        ->where(['active' => 10, 'id_jenis_berita' => $id_jenis_berita])
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