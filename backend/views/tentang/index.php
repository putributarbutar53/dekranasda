<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TentangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tentang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tentang-index">
    <p>
        <?php
        $tentang = backend\models\Tentang::find()->all();
        if ($tentang != null) {
            
        } else {
            echo Html::a('Tambah Tentang', ['create'], ['class' => 'btn btn-success']);
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
            'label' => 'Nama',
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
