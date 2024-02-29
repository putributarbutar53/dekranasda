<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\SejarahKetua */
/* @var $form yii\widgets\ActiveForm */
$bulan = array(
    'Januari' => 'Januari',
    'Februari' => 'Februari',
    'Maret' => 'Maret',
    'April' => 'April',
    'Mei' => 'Mei',
    'Juni' => 'Juni',
    'Juli' => 'Juli',
    'Agustus' => 'Agustus',
    'September' => 'September',
    'Oktober' => 'Oktober',
    'November' => 'November',
    'Desember' => 'Desember',
);
?>

<div class="sejarah-ketua-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'urutan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'foto')->widget(FileInput::classname(), [
        'options' => ['accept' => '*'],
    ]);
    ?>

    <table width="100%">
        <tr>
            <td width="20%">
                <?=
                $form->field($model, 'bulan_mulai')->widget(Select2::classname(), [
                    'data' => $bulan,
                    'options' => ['placeholder' => 'Pilih Bulan'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
                ?>
            </td>
            <td width="1%"></td>
            <td width="20%">
                <?=
                $form->field($model, 'tahun_mulai')->widget(DatePicker::classname(), [
                    'options' => ['value' => date('Y')],
                    'removeButton' => false,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy', //yyyy choose to year, yyyy-mm to month, yyyy-mm-dd to day
                        'startView' => 2, //The actual range (0: day 1: day 2: year)
                        'maxViewMode' => 2, //Maximum selection range (years)
                        'minViewMode' => 2, //Minimum selection range (years)
                    ]
                ])
                ?>
            </td>
            <td width="1%"></td>
            <td width="20%">
                <?=
                $form->field($model, 'bulan_selesai')->widget(Select2::classname(), [
                    'data' => $bulan,
                    'options' => ['placeholder' => 'Pilih Bulan'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])
                ?>
            </td>
            <td width="1%"></td>
            <td width="20%">
                <?=
                $form->field($model, 'tahun_selesai')->widget(DatePicker::classname(), [
                    'options' => ['value' => date('Y')],
                    'removeButton' => false,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy', //yyyy choose to year, yyyy-mm to month, yyyy-mm-dd to day
                        'startView' => 2, //The actual range (0: day 1: day 2: year)
                        'maxViewMode' => 2, //Maximum selection range (years)
                        'minViewMode' => 2, //Minimum selection range (years)
                    ]
                ])
                ?>
            </td>
        </tr>
    </table>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
