<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SejarahKetua */

$this->title = 'Tambah Sejarah Ketua';
$this->params['breadcrumbs'][] = ['label' => 'Sejarah Ketua', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sejarah-ketua-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
