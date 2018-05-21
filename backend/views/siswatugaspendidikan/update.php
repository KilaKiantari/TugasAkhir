<?php
use yii\helpers\Html;

$this->title = 'Update Tugas: ' . $result->nama_tugas;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $result->nama_tugas, 'url' => ['view', 'id' => $result->id_tugas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Tugas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
