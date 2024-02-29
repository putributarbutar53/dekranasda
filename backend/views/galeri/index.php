<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\GaleriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galeri';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeri-index">


    <p>
        <?= Html::a('Tambah Galeri', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama',
            [
            'attribute' => 'deskripsi',
            'format' => 'raw',
        ],
        'jumlah_view',
        //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
