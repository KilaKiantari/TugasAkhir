<?php
use yii\helpers\Html;
use yii\grid\Gridview;
use yii\widgets\ActiveForm;


use backend\models\Tugas;
use backend\controllers\orangtuatugasController;

$this->title = 'Daftar Tugas';
?>

<div class="row">
	<h3 >Daftar Tugas</h3>
	<hr>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Tugas</th>
				<th>Kategori</th>
				<th>Status Tugas</th>
				<th>Keterangan</th>
				<th>Tanggal Tugas</th>
			</tr>
		</thead>
		<tbody>
			<?php $n=0; foreach ($tugasb as $key) { $n++;?>
			<php $
				<tr>
					<td><?php echo $n;?></td>
					<td><?php echo Html::encode($key->nama_tugas);?></td>
					<td><?php echo orangtuatugasController::listKategori($key->kategori);?></td>
					<td><?php echo orangtuatugasController::listStatustugas($key->status_tugas);?></td>
					<td><?php echo Html::encode($key->keterangan);?></td>
					<td><?php echo Html::encode($key->tanggal_tugas);?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>