<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Penjual */

$this->title = 'Ubah Penjual: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penjuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penjual-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
