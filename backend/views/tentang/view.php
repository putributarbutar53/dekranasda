<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tentang */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Tentangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tentang-view">

    <p>
        <?= Html::a('Ubah Tentang', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Hapus Tentang', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus tentang?',
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
            'heading' => 'Detail Tentang ',
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
                'attribute' => 'foto',
                'format' => 'raw',
                'value' => Html::img($model->foto, ['width' => 400])
            ],
        ],
    ])
    ?>

</div>
