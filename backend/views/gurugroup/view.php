<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use backend\models\Grup;
use backend\models\Guru;
use backend\models\GruptugasForm;
use backend\models\Tugas;
use backend\models\Siswa;


$this->title = 'Data Siswa || Orang tua';
?>
<h3>Data Siswa Trial</h3>
<hr>

<div class="row">
    <div class="col-sm-12">
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Group</th>
                        <th>Siswa</th>
                       
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=0; foreach ($result as $key) { $n++;?>
                            <?php $grup = Grup::find()->where(['id_group'=>$key['id_group']])->one(); ?>
                            <?php $nama_lengkap = Siswa::find()->where(['id_siswa'=>$grup['siswa_id']])->one(); ?>
                            
                        <tr>
                            <td><?php echo $n;?></td>
                            <td><?php echo Html::encode($key->namagroup);?></td>
                            <td><?php echo Html::encode($nama_lengkap['nama_lengkap']);?></td>
                      
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>