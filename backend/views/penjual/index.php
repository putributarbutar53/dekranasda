<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PenjualSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anggota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjual-index">


    <p>
        <?php
        echo Html::a('Tambah Anggota', ['create'], ['class' => 'btn btn-success']);
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_user',
        'nama',
            'url_youtube:url',
            'url_twitter:url',
            //'url_instagram:url',
            //'url_facebook:url',
            //'kode_pos',
            //'id_des_kel',
            //'id_kecamatan',
            //'no_ktp',
            //'alamat',
            //'foto',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
