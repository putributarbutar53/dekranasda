<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kontak */

$this->title = 'Ubah Kontak: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kontak', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kontak-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
