<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ArtiLambang */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Arti Lambangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="arti-lambang-view">
    <p>
        <?= Html::a('Ubah Arti Lambang', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Hapus Arti Lambang', ['delete', 'id' => $model->id], [
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
            'heading' => 'Detail Arti Lambang ',
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
        [
                'attribute' => 'isi',
                'format' => 'raw',
            ],
            
        ],
    ])
    ?>

</div>
