<?php

use yii\helpers\Url;

$strukturOrganisasi = backend\models\StrukturOrganisasi::find()
        ->where(['active' => 10])
        ->one();

$sejarahKetua = backend\models\SejarahKetua::find()
        ->where(['active' => 10])
        ->all();
?>

<div class="page-content bg-white">
    <!-- Blog Post -->
    <div class="section-full bg-white content-inner" style="padding-top: 25px;">
        <div class="container">
            <div class="row">                
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="blog-post blog-single">
                        <div class="dlab-post-info">
                            <div class="dlab-post-text text mt-0">
                                <center><h2><span>Sejarah Ketua</span></h2></center>
                            </div>
                            <?php
                            foreach ($sejarahKetua as $sKetua) {
                                echo '<div class="bg-white p-a30 m-b30">
                                <div class="author-profile-info">
                                    <div class="author-profile-pic">
                                        <a href="javascript:void(0);">
                                            <img src="' . Yii::getAlias('@web') . '/' . $sKetua->foto . '" alt="Profile Pic" width="130" height="130">
                                        </a>
                                    </div>
                                    <div class="author-profile-content">
                                        <h6 class="title">' . $sKetua->jabatan . '</h6>
                                        <p>' . $sKetua->nama . '</p>
                                        <p>Periode ' . $sKetua->bulan_mulai . ' ' . $sKetua->tahun_mulai . ' s/d ' . $sKetua->bulan_selesai . ' ' . $sKetua->tahun_selesai . '</p>                                        
                                    </div>
                                </div>
                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="blog-post blog-single">
                        <div class="dlab-post-info">
                            <div class="dlab-post-text text mt-0">
                                <center><h2><span>Struktur Organisasi Dekranasda</span></h2></center>
                            </div>
                            <div class="col-lg-12 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                                <div class="dlab-post-media m-b50">
                                    <a href="post-standart.html"><img src="<?= Yii::getAlias('@web') . '/' . $strukturOrganisasi->foto ?>" alt=""></a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <!-- Blog Post End -->    
</div>