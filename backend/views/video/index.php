<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Video';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <p>
        <?= Html::a('Tambah Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'nama',
            'label' => 'Nama',
            'headerOptions' => ['style' => 'width:40%'],
        ],
        [
            'attribute' => 'keterangan',
            'label' => 'Keterangan',
            'format' => 'raw',
            'headerOptions' => ['style' => 'width:60%'],
        ],
//            'url:url',
//            'foto_thumbnail',
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
