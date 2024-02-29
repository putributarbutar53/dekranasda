<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GaleriChild */

$this->title = 'Update Galeri Child: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Galeri Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="galeri-child-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
