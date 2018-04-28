<?php
use yii\helpers\Html;
use yii\grid\Gridview;
use yii\widgets\ActiveForm;

use backend\models\Grup;
use backend\controllers\gurugroupController;

$this->title = 'Group';
?>

<div class="row">
	<h3 >Daftar Group</h3>
	<hr>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Group</th>
				
			</tr>
		</thead>
		<tbody>
			<?php $n=0; foreach ($grups as $key) { $n++;?>
				<tr>
					<td><?php echo $n;?></td>
					<td><?php echo Html::encode($key->namagroup);?>

					<td>
						<?php echo Html::a(
							'<i class="glyphicon glyphicon-search"></i> Detail',
							['view','id'=>$key->id_group],
							['class'=>'btn btn-sm btn-info']
							);
						?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>