<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Galeri */

$this->title = 'Tambah Galeri';
$this->params['breadcrumbs'][] = ['label' => 'Galeri', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeri-create">


    <?= $this->render('_form', [
        'model' => $model,
        'modelChild' => $modelChild
    ]) ?>

</div>
