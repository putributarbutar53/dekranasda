<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Video */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Video', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="video-view">

    <p>
        <?= Html::a('Ubah Video', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Hapus Video', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus video?',
        'method' => 'post',
    ],
        ]) ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Detail Video ' . $model->nama,
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
            
            'nama',
            [
                'attribute' => 'keterangan',
                'format' => 'raw',
            ],
            'url:url',
            [
            'attribute' => 'foto_thumbnail',
            'format' => 'raw',
                'value' => Html::img($model->foto_thumbnail, ['width' => 400])
            ],
            'jumlah_view',
        ],
    ])
    ?>


</div>
