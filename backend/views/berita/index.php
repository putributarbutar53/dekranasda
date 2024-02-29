<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BeritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-index">

    <p>
        <?= Html::a('Tambah Berita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute' => 'id_jenis_berita',
            'label' => 'Jenis',
            'value' => function($model) {
                return $model->jenisBerita->nama;
            },
            'headerOptions' => ['style' => 'width:5%'],
        ],
            [
            'attribute' => 'judul',
            'label' => 'Judul',
            'value' => function($model) {
                return $model->judul;
            },
            'headerOptions' => ['style' => 'width:95%'],
        ],
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
