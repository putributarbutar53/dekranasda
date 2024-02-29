<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Mars */

$this->title = 'Tambah Mars';
$this->params['breadcrumbs'][] = ['label' => 'Mars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mars-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
