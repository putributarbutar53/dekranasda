<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Visi;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\VisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visi-index">

    <p>
        <?php
        $visi = Visi::find()->all();
        if ($visi != null) {
            
        } else {
            echo Html::a('Tambah Visi', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute' => 'nama',
            'label' => 'Visi',
            'format' => 'raw',
            'headerOptions' => ['style' => 'width:95%'],
        ],
//        'created_at',
//            'updated_at',
//            'created_by',
        //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'widget:100px, align:center;'],
            'header' => 'Actions',
            'template' => '{update} &nbsp {delete}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/visi/update', 'id' => $model->id]), [
                        'class' => 'btn btn-info',
                        'title' => 'Ubah Visi',
                        'data-toggle' => 'tooltip',
                        'data-method' => 'post',
                    ]);
                },
                'delete' => function ($url, $model) {
                    return $model->active == 10 ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'class' => 'btn btn-danger',
                        'title' => 'Hapus Visi',
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
