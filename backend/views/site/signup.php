<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
?>
<div class="page-content bg-white">
    <!-- Checkout Section -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="section-head text-center">
                <span>Daftar Anggota</span>
            </div>
            <div class="row checkout-bx">
                <div class="col-lg-6 m-b30">
                    <h5 class="title-head"><span>Data Anggota</span></h5>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>                    

                    <?= $form->field($modelPenjual, 'nama')->textInput(['maxlength' => true, 'autofocus' => true]) ?>

                    <?= $form->field($modelPenjual, 'no_hp')->textInput(['maxlength' => true, 'type' => 'number']) ?>

                    <?= $form->field($modelPenjual, 'no_ktp')->textInput(['maxlength' => true, 'type' => 'number']) ?>                                                           

                    <?= $form->field($modelPenjual, 'alamat')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($modelPenjual, 'kode_pos')->textInput(['maxlength' => true, 'type' => 'number']) ?>

                    <?php
                    $dataKecamatan = ArrayHelper::map(\backend\models\MasterKecamatan::find()->all(), 'id', 'nama');
                    $dataDesKel = ArrayHelper::map(backend\models\MasterDesKel::find()->all(), 'id', 'nama');
echo $form->field($modelPenjual, 'id_kecamatan')->dropDownList($dataKecamatan, ['id' => 'kecamatan-id'])->label('Pilih Kecamatan');

                    //                    echo $form->field($modelPenjual, 'id_des_kel')->widget(DepDrop::classname(), [
//                        'options' => ['id' => 'des-kel-id'],
//                        'pluginOptions' => [
//                            'depends' => ['kecamatan-id'],
//                            'placeholder' => 'Pilih Desa Kelurahan',
//                            'url' => Url::to(['/penjual/lists'])
//                        ]
//                    ]);
echo $form->field($modelPenjual, 'id_des_kel')->dropDownList($dataDesKel, ['id' => 'des-kel-id'])->label('Pilih Desa');
?>

                    <?=
                    $form->field($modelPenjual, 'foto')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*'],
                    ]);
                    ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => false]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                </div>
                <div class="col-lg-6 m-b30">
                    <h5 class="title-head"><span>Informasi Tambahan</span></h5>
                    <?= $form->field($modelPenjual, 'url_youtube')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($modelPenjual, 'url_twitter')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($modelPenjual, 'url_instagram')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($modelPenjual, 'url_facebook')->textInput(['maxlength' => true]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Section End -->    
</div>