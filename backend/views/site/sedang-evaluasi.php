<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
$name = 'Notifikasi Pendaftaran';
$message = 'Yay! Pendaftaran akunmu sedang kami evaluasi';
$this->title = $name;
?>
<div class="page-wraper">
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner END -->
        <div class="content-block">
            <!-- About Us -->
            <div class="section-full bg-white content-inner-2 coming-soon overlay-black-light" style="background-image:url(images/banner/pic1.jpg); background-size:cover;">
                <div class="container">
                    <div class="text-center">
                        <div class="cs-logo">
                            <div class="logo"><img src="images/logo.png" alt=""/></div>
                        </div>
                        <div class="cs-title"><?=$name?></div>
                        <div class="cs-title"><?=$message?></div>
                        
                    </div>
                </div>
            </div>
            <!-- About Us End -->
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END-->
</div>
