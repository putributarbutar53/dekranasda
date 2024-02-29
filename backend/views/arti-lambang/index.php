<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\ArtiLambang;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArtiLambangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Arti Lambang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arti-lambang-index">


    <p>
        <?php
        $artiLambang = ArtiLambang::find()->all();
        if ($artiLambang != null) {
            
        } else {
            echo Html::a('Tambah Arti Lambang', ['create'], ['class' => 'btn btn-success']);
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
            'attribute' => 'foto',
            'format' => 'raw',
            'value' => function($model) {
                return Html::img($model->foto, ['width' => 400]);
            },
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
