<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\StrukturOrganisasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Struktur Organisasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="struktur-organisasi-index">

    <p>
        <?php
        $struktur = backend\models\StrukturOrganisasi::find()->all();
        if ($struktur != null) {

        } else {
            echo Html::a('Tambah Struktur Organisasi', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

    //            'id',
            [
                'attribute' => 'foto',
                'label' => 'Struktur Organisasi',
                'format' => 'raw',
                'headerOptions' => ['style' => 'width:95%'],
                'value' => function ($model) {
                    $url = $model->foto;
                    return Html::img($url, ['width' => 400]);
                }
            ],
            //            'created_at',
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
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['/struktur-organisasi/update', 'id' => $model->id]), [
                            'class' => 'btn btn-info',
                            'title' => 'Ubah Struktur Organisasi',
                            'data-toggle' => 'tooltip',
                            'data-method' => 'post',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return $model->active == 10 ? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'class' => 'btn btn-danger',
                                        'title' => 'Hapus Struktur Organisasi',
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
