<?php
use yii\helpers\Html;
use yii\grid\Gridview;
use yii\widgets\ActiveForm;


use backend\models\Tugas;
use backend\controllers\SiswatugasController;

$this->title = 'User || Siswa';
?>

<div class="row">
	<h3 >Daftar Tugas</h3>
	<hr>
	<p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Tugas</th>
				<th>Kategori</th>
				<th>Status Tugas</th>
				<th>Tanggal Tugas</th>
			</tr>
		</thead>
		<tbody>
			<?php $n=0; foreach ($tugass as $key) { $n++;?>
			<php $
				<tr>
					<td><?php echo $n;?></td>
					<td><?php echo Html::encode($key->nama_tugas);?></td>
					<td><?php echo SiswatugasController::listKategori($key->kategori);?></td>
					<td><?php echo SiswatugasController::listStatustugas($key->status_tugas);?></td>
					<td><?php echo Html::encode($key->keterangan);?></td>
					<td><?php echo Html::encode($key->tanggal_tugas);?></td>
					<td>
						<?php echo Html::a(
							'<i class="glyphicon glyphicon-search"></i> Detail',
							['view','id'=>$key->id_tugas],
							['class'=>'btn btn-sm btn-info']
							);
						?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>