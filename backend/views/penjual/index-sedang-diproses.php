<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PenjualSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permintaan Pendaftaran Anggota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjual-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
    //            'id_user',
        [
            'attribute' => 'id_user',
            'format' => 'raw',
            'label' => 'Username',
            'value' => function($model) {
                return $model->user->username;
            }
        ],
        'nama',
        'no_hp',
//            'url_twitter:url',
        //'url_instagram:url',
            //'url_facebook:url',
            //'kode_pos',
            //'id_des_kel',
            //'id_kecamatan',
            'no_ktp',
        'alamat',
        //'foto',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

                    [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {terima} {tolak}',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['/penjual/view', 'id' => $model->id]), [
                        'class' => 'btn btn-info',
                        'title' => 'View Detail Penjual',
                        'data-toggle' => 'tooltip',
                        'data-method' => 'post',
                    ]);
                },
                'terima' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-ok"></span>', Url::to(['/penjual/terima-penjual', 'id_user' => $model->id_user]), [
                        'class' => 'btn btn-success',
                        'title' => 'Terima Penjual',
                        'data-toggle' => 'tooltip',
                        'data-method' => 'post',
                    ]);
                },
                'tolak' => function ($url, $model) {
                    $url = Url::toRoute(['/penjual/tolak-penjual', 'id_user' => $model->id_user]);
                    Modal::begin([
                        'id' => 'modal-tolak' . $model->id,
                        'header' => '<h4 class="modal-title" id="title">Isi Data</h4>',
                        'size' => 'modal-lg',
                    ]);
                    echo "<div id='content-modal-tolak$model->id'></div>";
                    Modal::end();
                    return Html::a('<span class="glyphicon glyphicon-remove"></span>', '#', [
                        'class' => 'btn btn-danger',
                        'title' => 'Tolak Penjual',
                        'data-toggle' => 'modal',
                        'data-pjax' => 0,
                        'onclick' => "
                      $.ajax({
                        url: '$url',
                        success:function(data){
                          $('#title').html('Isi Data');
                          $('#content-modal-tolak" . $model->id . "').html(data);
                          $('#modal-tolak" . $model->id . "').modal('show');
                        },
                        error:function(xhr, ajaxOptions, throwError){
                          alert(xhr.responseText);
                        }
                      })",
                    ]);
                },
            ],
        ],
    ],
    ]); ?>


</div>
