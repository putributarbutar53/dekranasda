<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ArtiLambang */

$this->title = 'Tambah Arti Lambang';
$this->params['breadcrumbs'][] = ['label' => 'Arti Lambang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arti-lambang-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
