<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\HubungiKamiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hubungi Kami';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hubungi-kami-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama',
        'email:email',
            'pesan:ntext',
    //            'created_at',
        //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
