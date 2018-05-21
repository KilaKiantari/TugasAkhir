<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="User-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype'=>'multipart/form-data'
        ]
    ]); 

    $this->title = 'SignUp';
    $this->params['breadcrumbs'][] = $this->title;
?>
     <?= $form->field($model, 'firstname')->textInput(['maxlength' => true])->textInput(['placeholder' => "Input Firstname"]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->textInput(['placeholder' => "Input Username"]) ?>

      <?= $form->field($model, 'level')->dropDownList(
            $model->listLevel(),
            ['prompt'=>'-Pilih Level-']
        )->label('Nama Level') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->textInput(['placeholder' => "Input Email"]) ?>
    
    <?= $form->field($model, 'password')->passwordInput()->label('Password Hint') ?>

    <div class="form-group">
        <?= Html::submitButton('Create User', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
