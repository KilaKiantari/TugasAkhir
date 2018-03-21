<?php
use yii\helpers\Html;

$this->title = 'Update Tugas: ' . $model->nama_tugas;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_tugas, 'url' => ['view', 'id' => $model->id_tugas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Tugas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
