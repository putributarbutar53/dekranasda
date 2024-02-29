<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProgramKerja */

$this->title = 'Ubah Program Kerja: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Program Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="program-kerja-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
