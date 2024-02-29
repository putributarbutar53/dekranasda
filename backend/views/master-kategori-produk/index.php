<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MasterKategoriProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Kategori Produk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-kategori-produk-index">

    <p>
        <?= Html::a('Tambah Master Kategori Produk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

    //            'id',
        [
            'attribute' => 'nama',
            'headerOptions' => ['style' => 'width:85%'],
        ],
        //            'created_at',
//            'updated_at',
//            'created_by',
        //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'widget:100px, align:center;'],
            'header' => 'Actions',
            'template' => '{update}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/master-kategori-produk/update', 'id' => $model->id]), [
                        'class' => 'btn btn-info',
                        'title' => 'Ubah Master Kategori Produk',
                        'data-toggle' => 'tooltip',
                        'data-method' => 'post',
                    ]);
                },
            ]
        ],
    ],
    ]); ?>


</div>
