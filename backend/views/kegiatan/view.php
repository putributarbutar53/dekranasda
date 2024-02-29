<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kegiatan-view">

    <p>
        <?= Html::a('Ubah Kegiatan', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Hapus Kegiatan', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus kegiatan?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>
<?=
    DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Detail Kegiatan ',
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
            'judul',
            [
                'attribute' => 'isi',
                'format' => 'raw',
            ],
            'waktu_mulai',
            'waktu_selesai',
            [
                'attribute' => 'foto',
                'format' => 'raw',
                'value' => Html::img($model->foto, ['width' => 400])
            ],
            [
                'attribute' => 'file',
                'format' => 'raw',
                'value' => '<a href=' . $model->file . ' class="btn btn-md btn-primary" target="_blank"><i class="fa fa-download"></i></a>'
            ],
            'jumlah_view',
        ],
    ])
    ?>


</div>
