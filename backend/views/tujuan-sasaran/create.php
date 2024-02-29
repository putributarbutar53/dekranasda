<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TujuanSasaran */

$this->title = 'Tambah Tujuan Sasaran';
$this->params['breadcrumbs'][] = ['label' => 'Tujuan Sasaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tujuan-sasaran-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
