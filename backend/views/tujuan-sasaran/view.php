<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TujuanSasaran */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Tujuan Sasarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tujuan-sasaran-view">

    <p>
        <?= Html::a('Ubah Tujuan Sararan', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Hapus Tujuan Sasaran', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus tujuan sasaran?',
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
            'heading' => 'Detail Tujuan Sasaran ',
        'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
        [
                'attribute' => 'isi',
            'format' => 'raw',
            ],
    ],
    ])
    ?>

</div>
