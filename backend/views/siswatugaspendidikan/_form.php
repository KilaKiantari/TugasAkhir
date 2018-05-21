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

    
    <?= $form->field($model,'group_id')->dropDownList(
        $model->listGroup(),
        ['prompt'=>'-Pilih Group']
        )->label('Group')?>

    <?= $form->field($model,'kategori')->dropDownList(
        $model->listKategori(),
        ['prompt'=>'-Pilih Kategori']
        )->label('Group')?>

    <?= $form->field($model, 'nama_tugas')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'tanggal_tugas')->textInput(['maxlength' => true])?>

  



    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
