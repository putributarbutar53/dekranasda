<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GaleriChild */

$this->title = 'Create Galeri Child';
$this->params['breadcrumbs'][] = ['label' => 'Galeri Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeri-child-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
