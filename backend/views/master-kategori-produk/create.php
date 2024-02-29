<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterKategoriProduk */

$this->title = 'Tambah Master Kategori Produk';
$this->params['breadcrumbs'][] = ['label' => 'Master Kategori Produk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-kategori-produk-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
