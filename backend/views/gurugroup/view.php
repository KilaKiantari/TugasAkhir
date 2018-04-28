<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use backend\models\Grup;
use backend\models\Guru;
use backend\models\Tugas;


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
                        <th>Sekolah</th>
                    
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=0; foreach ($result as $key) { $n++;?>

                        <tr>
                            <td><?php echo $n;?></td>
                            <td><?php echo Html::encode($key['namagroup']);?></td>
                            <td><?php echo Html::encode($key['nama_lengkap']);?></td>
                            <td><?php echo Html::encode($key['sekolah']);?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>