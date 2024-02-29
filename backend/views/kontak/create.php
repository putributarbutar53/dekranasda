<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kontak */

$this->title = 'Tambah Kontak';
$this->params['breadcrumbs'][] = ['label' => 'Kontak', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontak-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
