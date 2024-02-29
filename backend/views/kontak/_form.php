<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Kontak */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kontak-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'alamat')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
    ]]);
    ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true, 'type' => 'number']) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true, 'type' => 'number']) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true, 'type' => 'number']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'youtube')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
