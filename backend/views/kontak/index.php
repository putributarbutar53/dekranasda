<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\KontakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kontak';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontak-index">


    <p>
        <?php
        $kontak = backend\models\Kontak::find()->all();
        if ($kontak != null) {
            
        } else {
            echo Html::a('Tambah Kontak', ['create'], ['class' => 'btn btn-success']);
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
            'attribute' => 'alamat',
            'format' => 'raw',
        ],
        'no_hp',
            'telepon',
            'fax',
            'email:email',
        'instagram',
        'twitter',
        'facebook',
        'youtube',
        //'updated_at',
        //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'widget:100px, align:center;'],
            'header' => 'Actions',
            'template' => '{update} &nbsp {delete}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/kontak/update', 'id' => $model->id]), [
                        'class' => 'btn btn-info',
                        'title' => 'Ubah Kontak',
                        'data-toggle' => 'tooltip',
                        'data-method' => 'post',
                    ]);
                },
                'delete' => function ($url, $model) {
                    return $model->active == 10 ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'class' => 'btn btn-danger',
                        'title' => 'Hapus Kontak',
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
