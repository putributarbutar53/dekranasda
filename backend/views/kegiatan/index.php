<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\KegiatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kegiatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kegiatan-index">


    <p>
        <?= Html::a('Tambah Kegiatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'judul',
            'headerOptions' => ['style' => 'width:70%'],
        ],
        [
            'attribute' => 'waktu_mulai',
            'format' => 'raw',
            'value' => function($model) {
                return date("d-M-Y", strtotime($model->waktu_mulai));
            },
            'headerOptions' => ['style' => 'width:15%'],
        ],
            [
            'attribute' => 'waktu_selesai',
            'format' => 'raw',
            'value' => function($model) {
                return date("d-M-Y", strtotime($model->waktu_selesai));
            },
            'headerOptions' => ['style' => 'width:15%'],
        ],
        //'foto',
        //'file',
            //'jumlah_view',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
