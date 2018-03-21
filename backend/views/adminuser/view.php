<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->firstname;
$this->params['breadcrumbs'][] = ['label' => 'Daftar User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="adminuser-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'firstname',
            'lastname',
            'username',
            'email',
            [
                'label'=>'Level',
                'attribute'=>'level',
                'value'=>$model->getLevel()
            ],
        ],
    ]) ?>

</div>