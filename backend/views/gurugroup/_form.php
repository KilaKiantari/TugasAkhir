<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\GrupguruForm;
use backend\models\Grup;

?>

<div class="User-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype'=>'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'namagroup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guru_id')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'matpel_id')->dropDownList(
            $model->listMatpel(),
            ['prompt'=>'-Pilih Matpel-']
        )->label('Matapelajaran')?>

 

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
