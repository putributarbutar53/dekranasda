<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Penjual */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penjual-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_youtube')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_twitter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_instagram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_des_kel')->textInput() ?>

    <?= $form->field($model, 'id_kecamatan')->textInput() ?>

    <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
