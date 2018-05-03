<?php
use yii\helpers\Html;
use yii\grid\Gridview;
use yii\widgets\ActiveForm;
use backend\models\Guru;
use backend\models\Matapelajaran;

use backend\models\Grup;
use backend\controllers\siswagrouptugasController;

$this->title = 'Group';
?>

<div class="row">
	<h3 >My List Group</h3>
	<?php echo Html::a(
		'Back',
		['index'],
		['class'=>'btn btn-sm btn-info']
		);
	?>
	<hr>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Group</th>
				<th>Nama Guru</th>
				<th>Mata Pelajaran</th>
			</tr>
		</thead>
		<tbody>
			<?php $n=0; foreach ($grups as $key) { $n++;?>
			<?php $grup = Grup::find()->where(['id_group'=>$key['id_group']])->one(); ?>
			<?php $nama_guru = Guru::find()->where(['id_guru'=>$grup['guru_id']])->one(); ?>
			<?php $nama_matpel = Matapelajaran::find()->where(['id_matpel'=>$grup['matpel_id']])->one(); ?>
				<tr>
					<td><?php echo $n;?></td>
					<td><?php echo Html::encode($key->namagroup);?>
					<td><?php echo Html::encode($nama_guru['nama_guru']);?></td>
					<td><?php echo Html::encode($nama_matpel['nama_matpel']);?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>