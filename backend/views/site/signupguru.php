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
     <?= $form->field($model, 'nama_guru')->textInput(['maxlength' => true])->textInput(['placeholder' => "Input Firstname"]) ?>

    <?= $form->field($model, 'tgl_lahir')->textInput(['maxlength' => true])->textInput(['placeholder' => "Input Latname"]) ?>

    <?= $form->field($model, 'sekolah')->textInput(['maxlength' => true])->textInput(['placeholder' => "Input Username"]) ?>

    <?= $form->field($model, 'nama_matpel')->textInput(['maxlength' => true])->textInput(['placeholder' => "Input Email"]) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Next Step', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
