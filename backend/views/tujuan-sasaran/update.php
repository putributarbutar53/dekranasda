<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TujuanSasaran */

$this->title = 'Ubah Tujuan Sasaran: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tujuan Sasaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tujuan-sasaran-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
