<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */

$this->title = 'Tambah Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kegiatan-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
