<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->nama_tugas;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="adminuser-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tugas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tugas], [
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
            'nama_tugas',
            'matpel_id',
            'kategori',
            'keterangan',
            'status_tugas',
            'tanggal_tugas',
        ],
    ]) ?>

</div>