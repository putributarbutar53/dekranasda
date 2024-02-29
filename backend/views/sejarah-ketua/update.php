<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SejarahKetua */

$this->title = 'Ubah Sejarah Ketua: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sejarah Ketua', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sejarah-ketua-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
