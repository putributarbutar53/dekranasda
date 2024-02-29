<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\MasterKategoriProduk;
use backend\models\Penjual;
use mihaildev\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=
    $form->field($model, 'id_kategori')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(MasterKategoriProduk::find()->all(), 'id', 'nama'),
        'options' => ['placeholder' => 'Pilih Kategori'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Kategori Produk');
    ?>


    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ukuran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warna')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'motif')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'deskripsi')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
]])->label('Deskripsi');
    ?>

<?=
$form->field($model, 'foto')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
]);
?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
