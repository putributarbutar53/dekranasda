<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tentang */

$this->title = 'Ubah Tentang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tentang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tentang-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
