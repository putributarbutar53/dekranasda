<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Mars */

$this->title = 'Ubah Mars: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mars-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
