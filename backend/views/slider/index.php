<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slider';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">
    <p>
        <?= Html::a('Tambah Slider', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

    //            'id',
        [
            'attribute' => 'keterangan',
            'label' => 'Keterangan',
            'format' => 'raw',
            'headerOptions' => ['style' => 'width:95%'],
        ],
//            'created_at',
//            'updated_at',
        //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
