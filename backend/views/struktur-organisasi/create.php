<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StrukturOrganisasi */

$this->title = 'Tambah Struktur Organisasi';
$this->params['breadcrumbs'][] = ['label' => 'Struktur Organisasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="struktur-organisasi-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
