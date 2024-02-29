<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mars-index">

    <p>
        <?php
        $artiLambang = backend\models\Mars::find()->all();
        if ($artiLambang != null) {

        } else {
            echo Html::a('Tambah Mars Dekranasda', ['create'], ['class' => 'btn btn-success']);
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
            'format' => 'raw',
            'headerOptions' => ['style' => 'width:60%'],
        ],
        'url:url',
//            'created_at',
//            'updated_at',
        //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'widget:100px, align:center;'],
            'header' => 'Actions',
            'template' => '{update} &nbsp {delete}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/mars/update', 'id' => $model->id]), [
                        'class' => 'btn btn-info',
                        'title' => 'Ubah Mars',
                        'data-toggle' => 'tooltip',
                        'data-method' => 'post',
                    ]);
                },
                'delete' => function ($url, $model) {
                    return $model->active == 10 ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'class' => 'btn btn-danger',
                        'title' => 'Hapus Mars',
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
