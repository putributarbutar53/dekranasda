<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProgramKerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Program Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-kerja-index">


    <p>
        <?php
        $artiLambang = backend\models\ProgramKerja::find()->all();
        if ($artiLambang != null) {

        } else {
            echo Html::a('Tambah Program Kerja', ['create'], ['class' => 'btn btn-success']);
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
            'attribute' => 'isi',
            'label' => 'Isi',
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
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/program-kerja/update', 'id' => $model->id]), [
                        'class' => 'btn btn-info',
                        'title' => 'Ubah Program Kerja',
                        'data-toggle' => 'tooltip',
                        'data-method' => 'post',
                    ]);
                },
                'delete' => function ($url, $model) {
                    return $model->active == 10 ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'class' => 'btn btn-danger',
                        'title' => 'Hapus Program Kerja',
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
