<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use mihaildev\ckeditor\CKEditor;
use dosamigos\ckeditor\CKEditor;
use kartik\date\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kegiatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'isi')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => [
            'filebrowserBrowseUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/browse.php?opener=ckeditor&type=files',
            'filebrowserImageBrowseUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/browse.php?opener=ckeditor&type=images',
            'filebrowserFlashBrowseUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/browse.php?opener=ckeditor&type=flash',
            'filebrowserUploadUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/upload.php?opener=ckeditor&type=files',
            'filebrowserImageUploadUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/upload.php?opener=ckeditor&type=images',
            'filebrowserFlashUploadUrl' => Yii::getAlias('@web/plugin/kcfinder') . '/upload.php?opener=ckeditor&type=flash',
            'allowedContent' => true,
        ]
    ])
    ?>

    <table style="width: 100%">
        <tr>
            <td style="width: 50%">
                <?=
                $form->field($model, 'waktu_mulai')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Waktu Mulai'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);
                ?>
            </td>
            <td>
                <?=
                $form->field($model, 'waktu_selesai')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Waktu Selesai'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);
                ?>
            </td>
        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <td style="width: 50%">
                <?=
                $form->field($model, 'foto')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                ]);
                ?>
            </td>
            <td>
                <?=
                $form->field($model, 'file')->widget(FileInput::classname(), [
                    'options' => ['accept' => '*'],
                ]);
                ?>  
            </td>
        </tr>
    </table>  
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
