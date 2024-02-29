<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-index">
    <p>
        <?= Html::a('Tambah Produk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama',
        [
            'attribute' => 'id_kategori',
            'label' => 'Kategori',
            'value' => function($model) {
                return $model->kategori->nama;
            },
//            'headerOptions' => ['style' => 'width:5%'],
        ],
        [
            'attribute' => 'id_penjual',
            'label' => 'Penjual',
            'value' => function($model) {
                return $model->penjual->nama;
            },
//            'headerOptions' => ['style' => 'width:5%'],
        ],
//        'id_kategori',
//            'id_penjual',
        
            'harga',
            //'ukuran',
            //'warna',
            //'motif',
            //'deskripsi:ntext',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
