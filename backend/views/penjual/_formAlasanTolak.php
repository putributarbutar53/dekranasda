<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Penjual */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penjual-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alamat')->textarea()->label('Alasan Penolakan') ?>

    <div class="form-group">
        <?= Html::submitButton('Kirim', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
