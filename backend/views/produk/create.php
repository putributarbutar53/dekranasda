<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Produk */

$this->title = 'Tambah Produk';
$this->params['breadcrumbs'][] = ['label' => 'Produk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
