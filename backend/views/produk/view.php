<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Produk */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Produk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Produk', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Hapus Produk', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus produk?',
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
            'heading' => 'Detail Produk ' . $model->nama,
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
            [
                'attribute' => 'id_kategori',
                'value' => $model->kategori->nama,
            'label' => 'Kategori'
        ],
            [
                'attribute' => 'id_penjual',
                'value' => $model->penjual->nama,
            'label' => 'Penjual',
        ],
            [
            'attribute' => 'foto',
            'format' => 'raw',
            'value' => Html::img($model->foto, ['width' => 400])
        ],
        'nama',
            'harga',
            'ukuran',
            'warna',
            'motif',
            [
                'attribute' => 'deskripsi',
                'format' => 'raw',
            ],
        ],
    ])
    ?>

</div>
