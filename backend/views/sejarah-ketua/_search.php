<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\SejarahKetuaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sejarah-ketua-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jabatan') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'foto') ?>

    <?= $form->field($model, 'bulan_mulai') ?>

    <?php // echo $form->field($model, 'tahun_mulai') ?>

    <?php // echo $form->field($model, 'bulan_selesai') ?>

    <?php // echo $form->field($model, 'tahun_selesai') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
