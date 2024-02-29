<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProgramKerja */

$this->title = 'Tambah Program Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Program Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-kerja-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
