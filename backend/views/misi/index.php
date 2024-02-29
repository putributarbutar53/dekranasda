<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Misi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="misi-index">


    <p>
        <?php
        $misi = backend\models\Misi::find()->all();
        if ($misi != null) {
            
        } else {
            echo Html::a('Tambah Misi', ['create'], ['class' => 'btn btn-success']);
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
            'label' => 'Misi',
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
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/misi/update', 'id' => $model->id]), [
                        'class' => 'btn btn-info',
                        'title' => 'Ubah Misi',
                        'data-toggle' => 'tooltip',
                        'data-method' => 'post',
                    ]);
                },
                'delete' => function ($url, $model) {
                    return $model->active == 10 ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'class' => 'btn btn-danger',
                        'title' => 'Hapus Misi',
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
