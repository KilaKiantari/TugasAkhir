<?php
use yii\helpers\Html;
use yii\grid\Gridview;
use yii\widgets\ActiveForm;

use backend\models\UserForm;
use backend\models\User;


$this->title = 'User || Admin';
?>

<div class="row">
	<h3 >Daftar User</h3>
	<hr>
	<p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Level</th>
			</tr>
		</thead>
		<tbody>
			<?php $n=0; foreach ($users as $key) { $n++;?>
				<tr>
					<td><?php echo $n;?></td>
					<td><?php echo Html::encode($key->firstname);?></td>
					<td><?php echo Html::encode($key->lastname);?></td>
					<td><?php echo Html::encode($key->getLevel());?></td>
					<td>
						<?php echo Html::a(
							'<i class="glyphicon glyphicon-search"></i> Detail',
							['view','id'=>$key->id],
							['class'=>'btn btn-sm btn-info']
							);
						?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>