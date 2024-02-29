<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HubungiKami */

$this->title = 'Create Hubungi Kami';
$this->params['breadcrumbs'][] = ['label' => 'Hubungi Kamis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hubungi-kami-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
