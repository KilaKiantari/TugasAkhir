<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="User-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype'=>'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'nama_tugas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'matpel_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kategori')->dropDownList(
            $model->listKategori(),
            ['prompt'=>'-Pilih Kategori-']
        )->label('Kategori') ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_tugas')->dropDownList(
            $model->listStatustugas(),
            ['prompt'=>'-Pilih Status-']
        )->label('Status Tugas') ?>
    
    <?= $form->field($model, 'tanggal_tugas')->textInput(['maxlength' => true])?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
