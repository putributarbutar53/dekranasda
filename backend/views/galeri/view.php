<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Galeri */

$this->title = $model->nama;
\yii\web\YiiAsset::register($this);
?>
<div class="galeri-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
            'heading' => 'Detail Galeri ',
            'type' => DetailView::TYPE_INFO,
        ],
        'buttons1' => '',
        'hAlign' => 'left',
        'vAlign' => 'top',
        'attributes' => [
            'nama',
            [
                'attribute' => 'deskripsi',
                'format' => 'raw',
            ],
            [
                'attribute' => 'foto_thumbnail',
                'format' => 'raw',
                'value' => Html::img($model->foto_thumbnail, ['width' => 200])
        ],
            'jumlah_view',
        ],
    ])
    ?>

    <?php
    $galeriChild = \backend\models\GaleriChild::find()
            ->where(['id_galeri' => $model->id])
            ->all();
    echo '<div class="col-md-12"><b><h2>Daftar Galeri Foto</h2></b><br>';
    foreach ($galeriChild as $gc) {
        echo Html::img($gc->foto, ['width' => 200, 'height' => 300]) . ' ';
}
    echo '</div>';
    ?>

</div>
