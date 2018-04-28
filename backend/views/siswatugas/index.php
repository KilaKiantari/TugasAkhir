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
        <?= Html::a('Create Tugas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Author</th>
				<th>Nama Tugas</th>
				<th>Kategori</th>
				<th>Status Tugas</th>
				<th>Keterangan</th>
				<th>Tanggal Tugas</th>
				<th>Tanggal Selesai</th>
				
			</tr>
		</thead>
		<tbody>
			<?php $n=0; foreach ($tugass as $key) { $n++;?>
				<tr>
					<td><?php echo $n;?></td>
					<td><?php echo Html::encode($key->author);?></td>
					<td><?php echo Html::encode($key->nama_tugas);?></td>
					<td><?php echo Html::encode($key->kategori);?></td>
					<td><?php echo Html::encode($key->status_tugas);?></td>
					<td><?php echo Html::encode($key->keterangan);?></td>
					<td><?php echo Html::encode($key->tanggal_tugas);?></td>
					<td><?php echo Html::encode($key->tanggal_selesai);?></td>
					<td>
						<?php echo Html::a('Delete', ['delete', 'id' => $key['id_tugas']], [
            				'class' => 'btn btn-danger',
            				'data' => [
                			'confirm' => 'Are you sure you want to delete this item?',
                				'method' => 'post',
            			],
        			])
						?>
							
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>