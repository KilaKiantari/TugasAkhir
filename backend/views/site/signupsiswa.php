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
     <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true])->textInput(['placeholder' => "Input Firstname"]) ?>

    <?= $form->field($model, 'sekolah')->textInput(['maxlength' => true])->textInput(['placeholder' => "Input Latname"]) ?>

    <?= $form->field($model, 'orangtua_id')->textInput(['maxlength' => true])->textInput(['placeholder' => "Input Username"]) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Next Step', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
