<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TujuanSasaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tujuan Sasaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tujuan-sasaran-index">

    <p>
        <?php
        $tujuanSasaran = backend\models\TujuanSasaran::find()->all();
        if ($tujuanSasaran != null) {
            
        } else {
            echo Html::a('Tambah Tujuan Sasaran', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
    //
//            'id',
        [
            'attribute' => 'isi',
            'label' => 'Isi',
            'format' => 'raw',
            'headerOptions' => ['style' => 'width:95%'],
        ],
//            'created_at',
//            'updated_at',
//            'created_by',
//            //'updated_by',
//            //'active',
        ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'widget:100px, align:center;'],
            'header' => 'Actions',
            'template' => '{update} &nbsp {delete}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/tujuan-sasaran/update', 'id' => $model->id]), [
                        'class' => 'btn btn-info',
                        'title' => 'Ubah Tujuan Sasaran',
                        'data-toggle' => 'tooltip',
                        'data-method' => 'post',
                    ]);
                },
                'delete' => function ($url, $model) {
                    return $model->active == 10 ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'class' => 'btn btn-danger',
                        'title' => 'Hapus Tujuan Sasaran',
                        'data-toggle' => 'tooltip',
                        'data-method' => 'post',
                        'data-confirm' => 'Apakah anda yakin ingin menghapus data ini?'
                    ]) : '';
                },
            ]
        ],
    ],
    ]); ?>


</div>
