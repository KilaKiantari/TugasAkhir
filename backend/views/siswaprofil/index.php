<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use backend\models\Orangtua;
use backend\models\Siswa;

?>

<div class="profilguru-view">
<h1>Profil Siswa</h1>
<hr>
    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]);?>
    
   <?php $siswa = Siswa::find()->where(['id_siswa'=>$siswas[0]['id_siswa']])->one(); ?>
    <?php $nama_orangtua = Orangtua::find()->where(['id_orangtua'=>$siswa['orangtua_id']])->one(); ?>
  

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Profil Siswa</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo Html::encode($siswa['nama_lengkap']);?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo Html::encode($siswa['sekolah']);?>" disabled>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Orangtua</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo Html::encode($nama_orangtua['nama_orangtua']);?>" disabled>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <?php ActiveForm::end();?>
</div>