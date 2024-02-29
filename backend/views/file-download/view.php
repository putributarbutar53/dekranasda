<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FileDownload */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'File Downloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="file-download-view">


    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
            'heading' => 'Detail Pedoman dan Juknis ' . $model->nama,
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
            [
                'attribute' => 'nama',
                'format' => 'raw',
            ],
            [
                'attribute' => 'file',
                'format' => 'raw',
                'value' => '<a href=' . $model->file . ' class="btn btn-md btn-primary" target="_blank"><i class="fa fa-download"></i></a>'
            ],
            'jumlah_download',
        // 'created_at',
        // 'updated_at',
        // 'created_by',
        // 'updated_by',
        // 'active',
        ],
    ])
    ?>

</div>
