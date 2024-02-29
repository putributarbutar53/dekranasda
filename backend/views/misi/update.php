<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Misi */

$this->title = 'Ubah Misi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Misi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="misi-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
