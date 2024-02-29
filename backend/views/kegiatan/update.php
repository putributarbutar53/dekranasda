<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */

$this->title = 'Ubah Kegiatan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kegiatan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
