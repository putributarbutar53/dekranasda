<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Penjual */

$this->title = 'Detail Penjual';
$this->params['breadcrumbs'][] = ['label' => 'Penjual', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="penjual-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Detail Penjual ' . $model->nama,
        'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
            [
                'attribute' => 'foto',
                'format' => 'raw',
                'value' => Html::img($model->foto, ['width' => 400])
            ],
            'nama',
            [
                'attribute' => 'no_ktp',
                'label' => 'No. KTP',
            ],
            'alamat',
            [
                'attribute' => 'id_kecamatan',
                'label' => 'Kecamatan',
                'value' => $model->kecamatan->nama
            ],
            [
                'attribute' => 'id_des_kel',
                'label' => 'Desa/Kelurahan',
                'value' => $model->desKel->nama
            ],
            [
                'attribute' => 'kode_pos',
                'label' => 'Kode Pos',
        ],
    ]
])
?>

</div>
