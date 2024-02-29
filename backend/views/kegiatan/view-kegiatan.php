<?php
$user = \common\models\User::find()
        ->where(['id' => $model->created_by])
        ->one();
?>

<div class="page-content bg-white">
    <!-- Post Standart -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="blog-post blog-single">
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-author"><span>by</span> <a href="author.html"><?= $user->username; ?></a></li>
                                    <li class="post-date">at <span><?= date("d M Y", strtotime($model->created_at)) ?></span></li>
                                </ul>
                            </div>
                            <h2 class="title"><?= $model->judul ?></h2>
                            <div class="dlab-post-media alignwide">
                                <a href="javascript:;"><img src="<?= Yii::getAlias('@web') . '/' . $model->foto ?>" alt=""></a>
                            </div>
                            <div class="dlab-post-text text">
                                <?= $model->isi ?>
                                <h6>Waktu Mulai: <?= date("d M Y", strtotime($model->waktu_mulai)) ?></h6>
                                <h6>Waktu Selesai: <?= date("d M Y", strtotime($model->waktu_selesai)) ?></h6>
                            </div>
                            <div class="post-footer">                                
                                <div class="share-post">
                                    <ul class="list-inline m-b0">
                                        <li><a href="javascript:void(0);" class="btn sharp radius-xl facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="javascript:void(0);" class="btn sharp radius-xl instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="javascript:void(0);" class="btn sharp radius-xl twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="javascript:void(0);" class="btn sharp radius-xl linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>                                       
                </div>
            </div>
        </div>
    </div>
    <!-- Post Standart End -->    
</div>