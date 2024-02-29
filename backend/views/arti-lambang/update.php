<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ArtiLambang */

$this->title = 'Ubah Arti Lambang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Arti Lambang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="arti-lambang-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
