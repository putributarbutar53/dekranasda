<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MasterDesKel */

$this->title = 'Create Master Des Kel';
$this->params['breadcrumbs'][] = ['label' => 'Master Des Kels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-des-kel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
