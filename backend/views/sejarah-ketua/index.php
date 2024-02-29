<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SejarahKetuaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sejarah Ketua';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sejarah-ketua-index">

    <p>
        <?= Html::a('Tambah Sejarah Ketua', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'urutan',
            'label' => 'Ketua Ke',
            'headerOptions' => ['style' => 'width:10%'],
        ],
        [
            'attribute' => 'nama',
            'label' => 'Nama',
            'headerOptions' => ['style' => 'width:45%'],
        ],
        [
            'attribute' => 'jabatan',
            'label' => 'Jabatan',
            'headerOptions' => ['style' => 'width:45%'],
        ],
//        'nama',
//        'jabatan',
//        'foto',
//            'bulan_mulai',
//        //'tahun_mulai',
        //'bulan_selesai',
            //'tahun_selesai',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
