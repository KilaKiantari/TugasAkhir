<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;


use backend\models\Guru;

?>

<div class="profilguru-view">
<h1>Profil guru</h1>
<hr>
    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]);?>
    
   <?php $guru = Guru::find()->where(['id_guru'=>$gurus[0]['id_guru']])->one(); ?>

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Profil Guru</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo Html::encode($guru['nama_guru']);?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo Html::encode($guru['sekolah']);?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Matapelajaran</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?php echo Html::encode($guru['nama_matpel']);?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?php echo Html::encode($guru['tgl_lahir']);?>" disabled>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <?php ActiveForm::end();?>
</div>