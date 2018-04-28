<?php
use yii\helpers\Html;

$this->title = 'Create Tugas';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Tugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
