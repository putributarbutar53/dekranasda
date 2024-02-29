<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Misi */

$this->title = 'Tambah Misi';
$this->params['breadcrumbs'][] = ['label' => 'Misi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="misi-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
