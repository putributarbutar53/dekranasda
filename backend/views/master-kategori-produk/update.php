<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterKategoriProduk */

$this->title = 'Ubah Master Kategori Produk: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Master Kategori Produk', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-kategori-produk-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
