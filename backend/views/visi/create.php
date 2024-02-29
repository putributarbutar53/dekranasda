<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Visi */

$this->title = 'Tambah Visi';
$this->params['breadcrumbs'][] = ['label' => 'Visi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visi-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
