<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SejarahKetua */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Sejarah Ketua', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sejarah-ketua-view">

    <p>
        <?= Html::a('Ubah Sejarah Ketua', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Hapus Sejarah Ketua', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus sejarah ketua?',
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
            'heading' => 'Detail Sejarah Ketua ' . $model->nama,
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
        [
            'attribute' => 'urutan',
            'label' => 'Ketua Ke-'
        ],
        'nama',
        'jabatan',
        [
            'attribute' => 'foto',
            'format' => 'raw',
            'value' => Html::img($model->foto, ['width' => 400])
        ],
        'bulan_mulai',
        'tahun_mulai',
        'bulan_selesai',
        'tahun_selesai',
    ],
    ])
    ?>


</div>
